<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
        dropzone.uploadFiles = function (files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
    </script>

</head>
@extends('layouts.app')

@section('template_title')
    {{ $race->name ?? 'Show Race' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Race</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('races.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Ranking Runners</h2>
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>QR</th>
                                <th>Dorsal</th>
                                <th>Time</th>
                                <th>Points</th>
                                <th>Insurer</th>
                            </tr>
                            @foreach ($runners as $runner)
                                <tr>
                                    <td>{{$runner->runner->id}}</td>
                                    <td>{{$runner->runner->name}}</td>
                                    <td>{{$runner->runner->address}}</td>
                                    <td>{{$runner->runner->birth_date}}</td>
                                    <td>{{$runner->qr}}</td>
                                    <td>{{$runner->dorsal}}</td>
                                    <td>{{$runner->time}}</td>
                                    <td>{{$runner->points}}</td>
                                    <td>{{$runner->insurer->name}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div id="dropzone">
                    <form action="{{ route('dropzoneFileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Drag and Drop Single/Multiple Files Here<br>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
