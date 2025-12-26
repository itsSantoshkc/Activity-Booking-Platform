<?php
include("header.php");
include("conn.php");
include("model/Activity.php");
include("model/Review.php");
include("./components/Navbar.php");
?>

<head>
    <link rel="stylesheet" href="css/details.css">
</head>

<main class='activity-container'>
    <div class='image-gallery'>
    
    <div class='image-grid-container' id='imageGridContainer'>
<?php
try {
    $id =  $_GET['activity'];
    $activityObj = new Activity($conn);
    $activityData = $activityObj->getActivityById($id);
    $mainImage = str_replace('../', '', $baseUrl . $activityData['images'][0]);
    
    for($i = 0;$i< count($activityData['images']);$i++){
        $image = str_replace('../', '', $baseUrl . $activityData['images'][$i]);
        $class = ($i === 0) ? 'main-grid-image' : 'sub-grid-image';
        echo "<img class='{$class}' src='{$image}' alt='Activity Image' />";
    }
    
    // <img class='sub-grid-image' src='' />
echo"</div>
</div>
</div>";


    echo "<div class='details'>
        <h1 id='activityTitle'>{$activityData['name']}</h1>
        <p class='location' id='activityLocation'>
          <span class='location-text'>{$activityData['location']}</span>
          <!-- <span class='view-location'>View Full Location</span> -->
        </p>
        <p class='rating' id='activityRating'>
            <i class='fas fa-star' style='color: #FFD700; font-size: 13px;'></i> 5 out of 5
        </p>
        <p class='description' id='activityDescription'>{$activityData['description']}</p>
        <div class='tags' id='activityTags'>
        <span><b>Nrs : </b>{$activityData['price']}</span>
        <span><b>Slots : </b> {$activityData['no_of_slots']}</span>
        <span><b>Date : </b> {$activityData['starting_date']}</span>
        </div>
        <div class='check-availability-container'>
          <button class='check-btn' id='openSlots'>
            <span class='check-text'>Check</span>
            <span class='availability-text'>Availability</span>
          </button>
        </div>
      </div>
    </main>";
    // var_dump($activityData);
} catch (Exception $e) {
    echo $e->getMessage();
}

try{
 $reviewObj = new Review($conn);
    $reviewDatas = $reviewObj->getReviewByActivityId($id);

    echo '<section class="reviews">
    <h2>Ratings & Reviews</h2><div id="reviewsContainer"></div>';
    // var_dump($reviewData);
    foreach($reviewDatas as $reviewData){
        
        echo"
        <div class='review'>
        <img src ='' alt='{$reviewData['firstName']}'>
        
        <div class='review-content'>
        <p class='reviewer-name'>{$reviewData['firstName']}</p>
        <p class='review-rating'>
        <i class='fas fa-star' style='color: #FFD700; font-size: 13px;'></i> {$reviewData['rating']} out of 5
        </p>
        <p class='review-text'>{$reviewData['review']} </p>
        <p class='review-date'>{$reviewData['createdAt']}</p>
        </div>
        </div>";
        }
    echo '</section>';
}catch (Exception $e) {
    echo $e->getMessage();
}

    ?>
<!-- Availability Popup -->
<div id="slotOverlay" class="overlay">
    <div class="popup">
        <div class="close" id="closeOverlay" aria-label="Close"></div>
        <h2 class="popup-title">Available Slots</h2>
        <div id="slotsContainer"></div>
    </div>
</div>

<!-- Booking Popup -->
<div id="bookSlotOverlay" class="overlay">
    <div class="book-popup">
        <div class="close" id="closeBookPopup" aria-label="Close"></div>
        <h2 class="popup-title">Book Slots</h2>

        <p id="selectedTime" class="selected-time"></p>

        <label class="field-label">No of Slots</label>
        <input
            type="number"
            id="slotInput"
            class="field-input"
            placeholder="Enter the number of slot you are booking for"
            min="1" />

        <p id="slotsRemainingText" class="slots-remaining"></p>

        <label class="field-label">Extra Information (Optional)</label>
        <textarea
            id="extraInfo"
            class="field-textarea"
            placeholder="Tell us any extra information you want us to know"></textarea>

        <div class="btn-row">
            <button id="cancelBook" class="cancel-btn">Cancel</button>
            <button id="confirmBook" class="confirm-btn">Confirm</button>
        </div>
    </div>
</div>

<!-- <script src="./js/details.js"></script> -->