<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identity Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <style>
        body {
            /* background: linear-gradient(135deg, #d4fc79, #96e6a1); */
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container{
           max-width: 800px;
           margin: 0 auto;
        }

        .card{
           border-radius: 10px;
        }
       .progress-container {
            margin-bottom: 10px;
            text-align: left;
        }
        .progress {
            height: 12px;
            background-color: #e0e0e0;
        }
        .progress-bar {
            background: linear-gradient(90deg, #007bff, #0056b3);
        }
        h2 {
            font-weight: 600;
            margin-bottom: 6px;
            color: #515050;
        }
        p {
            color: #666;
            font-size: 15px;
        }
        .form-label {
            font-weight: 500;
            text-align: left;
            display: block;
            color:#464d5f;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }
        .btn-primary {
            width: 140px;
            border-radius: 10px;
            font-weight: 600;
            padding: 12px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #003f7f);
        }
        .div{
           padding:20px 20px 20px 40px
        }
        .upload-container {

            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border:1px dotted grey;
        }
        .dz-message {
            font-size: 18px;
            color: #6c757d;
        }
        .progress-bar {
            width: 100%;
            height: 8px;
            background-color: #007bff;
            transition: width 0.4s ease;
        }
    </style>
</head>
<body>
    <div id="loading-spinner" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Processing...</span>
    </div>
</div>

    <div class="container">
        <div class="card">
            <div class="progress-container">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="bar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between mt-2" style="padding-left: 10px;padding-right: 10px">
                  <div style="font-size: 13px;color:#464d5f;"><span id="complete"> 0% </span> Completed</div>
                  <div  style="font-size: 13px;color:#464d5f;">Fields Completed <span id="field_complete"> 0 </span> / 4</div>
                </div>
            </div>
            <div class="div" id="step1">
                <h2>Identity Verification</h2>
                <p>Submit a document verifying your identity</p>
            </div>
         <hr>
        <div class="div" id="step11">
            <form>
                <div>
                  <label class="form-label">Full Name</label>
                   <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="first_name" required>
                            <label style="font-size: 13px;margin-top: 9px;" for="">first name</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="last_name" required>
                            <label style="font-size: 13px;margin-top: 9px;" for="">last name</label>
                        </div>
                    </div>
                </div>
        </div>
        <hr>
         <div class="p-4"  id="step111" >
            <button id="next_one" style="float:right;" type="button" class="btn btn-primary btn-sm">Next</button>
         </div>
        </form>
        <div class="div" id="step2" style="display:none">
            <h2 style="font-size: 14px;">Upload the Front Side Image of Your Identity Document</h2>
            <form action="/upload" class="dropzone" id="front-upload">
                <div class="dz-message">
                    <i class="fas fa-cloud-upload-alt" style="font-size: 40px; color: #007bff;"></i>
                    <p>Drag and drop your file here </p>
                </div>
            </form>
            <br>
            <button style="float:left;" id="back_two" class="btn btn-default">Back</button>
            <button style="float:right;" id="next_two" class="btn btn-primary btn-sm">Next</button>
        </div>
        <div class="div" id="step3" style="display:none">
            <h2 style="font-size: 14px;">Upload the Reverse Side of Your Identity Document</h2>
            <form action="/upload" class="dropzone" id="back-upload">
                <div class="dz-message">
                    <i class="fas fa-cloud-upload-alt" style="font-size: 40px; color: #007bff;"></i>
                    <p>Drag and drop your file here </p>
                </div>
            </form>
            <br>
            <button style="float:left;" id="back_three" class="btn btn-default">Back</button>
            <button style="float:right;" id="next_three" class="btn btn-primary btn-sm">Next</button>
        </div>
        <div class="div" id="step4" style="display:none">
    <h2 style="font-size: 16px;">Take a picture of yourself holding your identification document, ensuring both your face and the document are clearly visible.</h2>
    <br>
    <div id="camera-preview" style="display: none;">
        <video id="video" autoplay style="width: 100%; border-radius: 10px;"></video>
        <br>
        <button id="capture-btn" class="btn btn-sm btn-primary">
            <i class="fas fa-camera"></i> Capture Photo
        </button>
    </div>
    <canvas id="canvas" style="display: none;"></canvas>
    <div id="selfie-preview" style="display: none; margin-bottom: 20px;">
        <img id="preview-image" src="#" alt="Selfie Preview" style="max-width: 100%; border-radius: 10px;">
    </div>
    <form>
        <label class="btn btn-sm btn-primary" for="selfie-upload">
            <i class="fas fa-camera"></i> Open Camera
        </label>
        <input style="display:none" type="file" id="selfie-upload" accept="image/*" capture="user" required>
    </form>
    <br>
    <p>Avoid uploading any images that have been edited or manipulated with software like Photoshop.</p>
    <br>
    <button style="float:left;" id="back_four" class="btn btn-default btn-sm">Back</button>
    <button style="float:right;" id="submit" class="btn btn-primary btn-sm" onclick="showLoading()">Submit</button>

</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Dropzone for front image
        Dropzone.options.frontUpload = {
            autoProcessQueue: false,
            maxFiles: 1,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictRemoveFile: "Remove File",
            init: function() {
                var myDropzone = this;

                // File added event
                this.on("addedfile", function(file) {
                    console.log("Front image added:", file);
                    localStorage.setItem('front_image', file.name);
                });
            }
        };

        // Initialize Dropzone for back image
        Dropzone.options.backUpload = {
            autoProcessQueue: false,
            maxFiles: 1,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictRemoveFile: "Remove File",
            init: function() {
                var myDropzone = this;

                // File added event
                this.on("addedfile", function(file) {
                    console.log("Back image added:", file);
                    localStorage.setItem('back_image', file.name);
                });
            }
        };

        // Handle selfie image upload and preview
        const selfieInput = document.querySelector('#step4 input[type="file"]');
        const previewImage = document.getElementById('preview-image');
        const selfiePreview = document.getElementById('selfie-preview');

        selfieInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    selfiePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
                console.log("Selfie image added:", file);
                localStorage.setItem('selfie_image', file.name);
            }
        });
    </script>

    <script>
        function check(bar,complete,field_complete){
            document.getElementById("bar").style.width=bar
            document.getElementById("complete").textContent=complete
            document.getElementById("field_complete").textContent=field_complete
        }
        document.getElementById('next_one').addEventListener('click',function(){
            let first_name  = document.getElementById('first_name').value
            let last_name  = document.getElementById('last_name').value

            if(first_name == '' || last_name == ""){
                alert('Please enter name')
                return;
            }

            localStorage.setItem('first_name',first_name)
            localStorage.setItem('last_name',last_name)

            document.getElementById("step2").style.display='block'
            document.getElementById("step1").style.display='none'
            document.getElementById("step111").style.display='none'
            document.getElementById("step11").style.display='none'

            check('50%','50%',2)
        })

        document.getElementById('next_two').addEventListener('click',function(){
            document.getElementById("step3").style.display='block'
            document.getElementById("step2").style.display='none'
            document.getElementById("step11").style.display='none'
            document.getElementById("step1").style.display='none'
            document.getElementById("step111").style.display='none'

            check('80%','80%',3)
        })

        document.getElementById('back_two').addEventListener('click',function(){
            document.getElementById("step3").style.display='none'
            document.getElementById("step2").style.display='none'
            document.getElementById("step11").style.display='block'
            document.getElementById("step1").style.display='block'
            document.getElementById("step111").style.display='block'

            check('0%','0%',0)

        })
        document.getElementById('back_three').addEventListener('click',function(){
            document.getElementById("step3").style.display='none'
            document.getElementById("step2").style.display='block'
            document.getElementById("step11").style.display='none'
            document.getElementById("step1").style.display='none'
            document.getElementById("step111").style.display='none'

            check('50%','50%',2)

        })
        document.getElementById('next_three').addEventListener('click',function(){
            document.getElementById("step3").style.display='none'
            document.getElementById("step2").style.display='none'
            document.getElementById("step4").style.display='block'

            document.getElementById("step11").style.display='none'
            document.getElementById("step111").style.display='none'

            document.getElementById("step1").style.display='none'
            check('100%','100%',4)

        })
        document.getElementById('back_four').addEventListener('click',function(){
            document.getElementById("step3").style.display='block'
            document.getElementById("step2").style.display='none'
            document.getElementById("step4").style.display='none'

            document.getElementById("step11").style.display='none'
            document.getElementById("step111").style.display='none'

            document.getElementById("step1").style.display='none'
            check('80%','80%',3)

        })
    </script>
    <script>
document.getElementById('submit').addEventListener('click', function(e) {
    e.preventDefault();

    // Get Dropzone instances
    const frontDropzone = Dropzone.forElement("#front-upload");
    const backDropzone = Dropzone.forElement("#back-upload");

    // Validate all fields
    if (!frontDropzone.files[0] || !backDropzone.files[0] || !selfieInput.files[0]) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please upload all required images.'
        });
        return;
    }

    // Create FormData
    const formData = new FormData();
    formData.append('first_name', localStorage.getItem('first_name'));
    formData.append('last_name', localStorage.getItem('last_name'));
    formData.append('front_image', frontDropzone.files[0]);
    formData.append('back_image', backDropzone.files[0]);
    formData.append('selfie_image', selfieInput.files[0]);

    // Send data to server
    fetch('/verify', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your verification has been submitted successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                // Clear local storage and reset form
                localStorage.clear();
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Something went wrong!'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while submitting your verification'
        });
    });
});    </script>


    <script>
        // Camera functionality
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const captureBtn = document.getElementById('capture-btn');
const cameraPreview = document.getElementById('camera-preview');
const selfieInput = document.getElementById('selfie-upload');

// Open camera when "Open Camera" is clicked
document.querySelector('label[for="selfie-upload"]').addEventListener('click', async function() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        cameraPreview.style.display = 'block';
        selfieInput.style.display = 'none'; // Hide file input
    } catch (error) {
        alert('Unable to access the camera. Please ensure your camera is enabled.');
        console.error('Camera access error:', error);
    }
});

// Capture photo
captureBtn.addEventListener('click', function() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert canvas image to a file
    canvas.toBlob((blob) => {
        const file = new File([blob], 'selfie.png', { type: 'image/png' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        selfieInput.files = dataTransfer.files;

        // Stop the camera stream
        const stream = video.srcObject;
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }

        cameraPreview.style.display = 'none';
        selfieInput.style.display = 'none'; // Keep file input hidden
        alert('Photo captured successfully!');
    }, 'image/png');
});
    </script>

    <script>
    function showLoading() {
        document.getElementById("loading-spinner").style.display = "block"; // Show spinner
        document.getElementById("submit").disabled = true; // Disable submit button

        // Simulate form submission delay (remove in actual implementation)
        setTimeout(function() {
            document.getElementById("loading-spinner").style.display = "none";
            document.getElementById("submit").disabled = false;
            Swal.fire({
                icon: "success",
                title: "Submitted!",
                text: "Your identity verification has been submitted successfully.",
            });
        }, 3000); // Simulate processing time of 3 seconds
    }
</script>

</body>

</html>
