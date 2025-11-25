<?php
include("header.php");
?>

<body>
  <?php
  include("./components/Navbar.php")
  ?>

  <div class="w-full border-gray-600  flex justify-center items-center my-20">
    <div class="w-3/6  h-16  flex rounded-3xl  shadow-lg items-center justify-between">
      <form class="w-[90%] *:h-16  *:focus:outline-none *:focus:bg-slate-100 *:text-xl flex justify-center items-center">
        <input type="text" placeholder="Destination" class="
         w-2/5   py-1 px-6 placeholder:px-2   rounded-l-3xl ">
        <span class="flex justify-center items-center mx-1">|</span>
        <input type="datetime-local" placeholder="Date" class="
         w-2/5  py-1 px-2 placeholder:px-2    ">
        <span class="flex justify-center items-center mx-1">|</span>

        <select placeholder="No of People" class="
         w-1/5  py-1 px-2 placeholder:px-2  placeholder:text-wrap">
          <option value='0'>No of People</option>
          <?php
          for ($i = 1; $i < 25; $i++) {
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </form>
      <div class="w-[10%]  flex justify-start items-center h-16 rounded-r-3xl">
        <div class="  text-white w-full h-full flex justify-center items-center  text-2xl">
          <div class="cursor-pointer h-12 w-12 bg-red-500 text-center flex justify-center  items-center rounded-full">
            <i class="fa  fa-search " aria-hidden="true"></i>
          </div>
        </div>

      </div>
    </div>
  </div>



  <div class="min-h-screen w-full flex items-center justify-center">
    <div
      class="grid grid-cols-3 gap-x-24 gap-y-12 w-4/5 place-items-center"
      id="content"></div>
  </div>
</body>
<script type="module">
  import {
    faker
  } from "https://esm.sh/@faker-js/faker";
  const content = document.getElementById("content");
  for (let i = 0; i < 6; i++) {
    content.innerHTML += ` <div>
          <div class="max-h-[90%] w-full  relative">
            <img
              class="z-0  w-full h-full rounded-3xl object-contain "
              src=${faker.image.urlLoremFlickr({ width: 1280, height: 960 })}
              alt="Rafting Image"
            />
            <div
              class="absolute font-semibold bg-white text-black rounded-2xl p-2 bottom-2 right-2 z-10"
            >
              ⭐ ${faker.number.float({
                min: 0,
                max: 5,
                multipleOf: 0.25,
              })} Out of 5
            </div>
          </div>
          <div class="py-2">
            <h3 class="font-bold text-3xl text-gray-600">${faker.commerce.product()}</h3>
            <p class="font-semibold text-xl text-gray-600">${faker.location.city()}, ${faker.location.county()}</p>
          </div>
        </div>`;
  }
</script>

</html>