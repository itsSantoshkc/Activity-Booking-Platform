<head>
    <link rel="stylesheet" href="css/newactivity.css" />
</head>
<?php
include("./component/Sidebar.php");
include("../header.php");
?>
<form class="main" onsubmit="handleSubmit(event)">
    <!-- <div class="image-section">
          <div class="image-large" id="imgPreviewMain"><i class="fa-solid fa-camera"><input type="file" id="imageInput" accept="image/*" style="display: none;"></i></div>

          <div class="image-row">
              <input type="file" id="imageInput" accept="image/*" hidden></div>
              <input type="file" id="imageInput" accept="image/*" hidden></div>
              <input type="file" id="imageInput" accept="image/*" hidden></div>
          </div> -->
    <div class="flex justify-center w-[500px]">
        <div class="grid grid-cols-3 gap-5 place-content-center  *:rounded-xl ">

            <label for="img-1"
                class="col-span-3 flex justify-center items-center w-[500px] h-64 bg-slate-200 cursor-pointer">
                <input onchange="handleImageChange(event)" type="file" id="img-1" class="hidden">
                <img class="w-full h-full object-cover rounded-xl hidden" src="" alt="">
                <i class="fa-solid fa-camera text-6xl"></i>
            </label>

            <label for="img-2"
                class="col-span-1 flex justify-center items-center h-32 bg-slate-300 cursor-pointer">
                <input onchange="handleImageChange(event)" type="file" id="img-2" class="hidden">
                <img class="w-full h-full object-cover rounded-xl hidden" src="" alt="">
                <i class="fa-solid fa-camera text-xl"></i>
            </label>

            <label for="img-3"
                class="col-span-1 flex justify-center items-center h-32 bg-slate-300 cursor-pointer">
                <input onchange="handleImageChange(event)" type="file" id="img-3" class="hidden">
                <img class="w-full h-full object-cover rounded-xl hidden" src="" alt="">
                <i class="fa-solid fa-camera text-xl"></i>
            </label>

            <label for="img-4"
                class="col-span-1 flex justify-center items-center h-32 bg-slate-300 cursor-pointer">
                <input onchange="handleImageChange(event)" type="file" id="img-4" class="hidden">
                <img class="w-full h-full object-cover rounded-xl hidden" src="" alt="">
                <i class="fa-solid fa-camera text-xl"></i>
            </label>

        </div>
    </div>



    <div class="activity-form" id="activityForm">

        <div class="field">
            <label>Name</label>
            <input type="text" id="name" placeholder="Enter the name of the activity">
        </div>

        <div class="field">
            <label>Price</label>
            <input type="number" id="price" placeholder="Enter the price">
        </div>

        <div class="field">
            <label>Description</label>
            <textarea id="description" placeholder="Enter the description"></textarea>
        </div>

        <div class="field">
            <label>Number of Slots</label>
            <input type="number" id="slots" placeholder="Enter the number of slots available per activity">
        </div>

        <div class="field">
            <label>Duration</label>
            <input type="text" id="duration" placeholder="Enter the duration">
        </div>

        <div class="field">
            <label>Location</label>
            <input type="text" id="location" placeholder="Enter the location">
        </div>

        <button type="submit" class="create-btn">Create</button>
    </div>
</form>

<script src="./js/newactivity.js"></script>
</body>

</html>