<div>
    <form  method="POST"  action="{{ url('image/upload') }}" accept-charset="utf-8" enctype="multipart/form-data" class="flex-col space-y-6">
        @csrf
        <div class="form-group">
            <div class="flex-col flex items-center">
                <div>
                    <label for="title">Title</label>
                    <input type="name" name="title" id="title">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="flex-col flex items-center">
                <div>
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="flex-col flex items-center">
                <div>
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url">
                </div>
            </div>
        </div>
        <div class="form-group flex justify-around">
            <div>
                <label for="width">Width</label>
                <input type="number" name="width" id="width">
            </div>
            <div>
                <label for="height">Height</label>
                <input type="number" name="height" id="height">
            </div>
        </div>
        <div class="form-group">
            <div id="nowmPreview" class="flex-col flex items-center">
                <div class="w-36 h-28 bg-gray-200 rounded flex justify-center items-center">
                    <i class="bi bi-images text-3xl"></i>
                </div>
                <label for="wmFile">
                    <input type="file" id="wmFile" name="wmImage" autocomplete="off" class="hidden">
                    <a class="text-primary flex justify-center font-medium text-sm mt-3">Upload watermark image</a>
                </label>
            </div>
            <div id="wmPreview" class="relative hidden">
                <div class="flex-col flex items-center">
                    <img src="" class="w-36 h-28 border border-gray-200" id="wmImage">
                </div>
                <label for="wmFile"  class="">
                    <input type="file" id="wmFile" name="wmImage" autocomplete="off" class="hidden">
                    <a class="text-primary flex justify-center font-medium text-sm mt-3">Change image</a>
                </label>
            </div>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="inline-block px-6 py-2.5 font-medium !bg-sky-500 text-white hover:!bg-sky-700
            text-sm leading-tight rounded shadow-md hover:shadow-lg transition duration-150 ease-in-out">
                Download Image
            </button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(
        function() {

            var previewImage = function(input) {
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $("#image").attr('src', event.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            };

            $('#file').on('change', function() {
                $("#noPreview").hide()
                $("#preview").show()
                previewImage(this);
            });

            var wmPreviewImage = function(input) {
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $("#wmImage").attr('src', event.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            };

            $('#wmFile').on('change', function() {
                $("#nowmPreview").hide()
                $("#wmPreview").show()
                wmPreviewImage(this);
            });
        }
    )
</script>