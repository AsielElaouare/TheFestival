<?php if ($adminIsLoggedIn): ?>
    <div class="d-flex justify-content-center align-items-center w-100 mt-5 mb-5">
        <button type="button" onclick="submitChanges()" class="btn primary-button">Submit Content Changes</button>
    </div>
    </form>
<?php endif; ?>
<script>
    tinymce.init({
        selector: '.contenteditable',
        plugins: 'autoresize link image',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
        menubar: false,
        images_upload_url: "/admincms/uploadimg",
        automatic_uploads: true, 
        images_upload_base_path: '', 
        file_picker_types: 'image',  
    });
</script>
<footer class="mt-auto w-100 mt-auto">
    <img src="/uploads/skyline.svg" alt="" class="w-100">
    <div class="container-fluid p-0 bg-purple-footer d-flex justify-content-between">
        <div class="d-flex">
            <div class="m-3">
                <ul class="list-unstyled yellow">
                    <li>Home</li>
                    <li>Yummy</li>
                    <li>Jazz</li>
                    <li>Tickets</li>
                </ul>
            </div>
            <div class="m-3">
                <ul class="list-unstyled yellow">
                    <li>Dance</li>
                    <li>History</li>
                    <li>Tylers</li>
                </ul>
            </div>
        </div>
        <div class="m-3">
            <div class="d-flex flex-column align-items-center">
               <p class="yellow">Sponsored by</p>
                <img width="50px" class="mt-1" src="https://media.theapolis.de/uploads/organization/5f399c0d2128c.png" alt="">
            </div>
        </div>
        <div class="m-3">
           <div class="yellow">
                <i style="font-size: 2rem;" class="fa-brands fa-instagram me-2"></i>
                <i style="font-size: 2rem;" class="fa-brands fa-tiktok me-2 icon-size"></i>
                <i style="font-size: 2rem;" class="fa-brands fa-square-facebook me-2 icon-size"></i>
           </div> 
        </div>
    </div>
</footer>
</main>
</body>
</html>
