// details.js - Only details-specific functionality

// Complete Activities Data for all 6 activities
const allActivitiesData = {
    1: {
        id: 1,
        title: "Mountain Trekking Adventure",
        location: "Pokhara, Nepal",
        rating: 4.8,
        totalReviews: 156,
        description: "Experience the breathtaking beauty of the Annapurna range with our guided mountain trekking adventure. This journey takes you through lush forests, traditional villages, and high-altitude landscapes offering panoramic views of some of the world's highest peaks.",
        price: "Rs. 8,000 per person",
        duration: "5 Days",
        features: ["Professional Guide", "Accommodation", "Meals Included", "Permit Processing"],
        images: [
            "https://plus.unsplash.com/premium_photo-1661833879387-1513bf753554?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bW91bnRhaW4lMjB0cmVra2luZ3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&q=60&w=300",
            "https://plus.unsplash.com/premium_photo-1677002240252-af3f88114efc?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8bW91bnRhaW4lMjB0cmVra2luZ3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&q=60&w=300",
            "https://images.unsplash.com/photo-1683044414176-0e0d42b6fddf?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fG1vdW50YWluJTIwdHJla2tpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=300",
            "https://media.istockphoto.com/id/1361421117/photo/hiking-couple-climb-up-mountain-ridge.webp?a=1&b=1&s=612x612&w=0&k=20&c=0XwZPFE1ZRqbkTUXewsuUv1KqpchQyDxmfrCi1UDk08="
        ],
        timeSlots: [
            { time: "6:00 AM", available: true, slotsRemaining: 5 },
            { time: "7:30 AM", available: true, slotsRemaining: 8 },
            { time: "9:00 AM", available: false, slotsRemaining: 0 },
            { time: "10:30 AM", available: true, slotsRemaining: 3 }
        ],
        reviews: [
            {
                id: 1,
                userName: "Alex Thompson",
                userAvatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face",
                rating: 5.0,
                comment: "Absolutely incredible experience! The guides were knowledgeable and the views were beyond spectacular.",
                date: "2024-02-10"
            },
            {
                id: 2,
                userName: "Maria Garcia",
                userAvatar: "https://plus.unsplash.com/premium_photo-1688350839154-1a131bccd78a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bGFkeSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=400",
                rating: 4.5,
                comment: "Challenging but rewarding trek. The sunrise view from Poon Hill was worth every step.",
                date: "2024-01-28"
            }
        ]
    },
};

// Utility Functions
function generateStarRating(rating) {
    return `<i class="fas fa-star" style="color: #FFD700; font-size: 13px;"></i> ${rating} out of 5`;
}

// UI Population Functions
function populateActivityDetails(activityData) {
    document.getElementById("activityTitle").textContent = activityData.title;
    document.getElementById("activityLocation").innerHTML = `<span class="location-text">${activityData.location}</span><span class="view-location">View Full Location</span>`;
    document.getElementById("activityRating").innerHTML = generateStarRating(activityData.rating);
    document.getElementById("activityDescription").textContent = activityData.description;

    document.getElementById("activityTags").innerHTML = `
        <span>${activityData.price}</span>
        <span>Duration: ${activityData.duration}</span>
        ${activityData.features.map((f) => `<span>${f}</span>`).join("")}
    `;

    // populateImageGallery(activityData);
    // populateTimeSlots(activityData);
    // populateReviews(activityData);
}

function populateImageGallery(activityData) {
    const imageGridContainer = document.getElementById("imageGridContainer");

    if (activityData.images.length > 0) {
        imageGridContainer.innerHTML = '';
        
        // Create main image
        const mainImage = document.createElement('img');
        mainImage.className = 'main-grid-image';
        mainImage.src = activityData.images[0];
        mainImage.alt = activityData.title;
        
        // Create sub images
        const subImages = activityData.images.slice(1, 4).map((img, index) => {
            const subImg = document.createElement('img');
            subImg.className = 'sub-grid-image';
            subImg.src = img;
            subImg.alt = `${activityData.title} ${index + 2}`;
            
            subImg.addEventListener('click', function() {
                const currentMainSrc = mainImage.src;
                mainImage.src = this.src;
                this.src = currentMainSrc;
                
                document.querySelectorAll('.sub-grid-image').forEach(img => img.classList.remove('active'));
                this.classList.add('active');
            });
            
            return subImg;
        });

        imageGridContainer.appendChild(mainImage);
        subImages.forEach(img => imageGridContainer.appendChild(img));
        
        if (subImages.length > 0) {
            subImages[0].classList.add('active');
        }
    }
}

function populateTimeSlots(activityData) {
    document.getElementById("slotsContainer").innerHTML = activityData.timeSlots
        .map((slot) => `
            <div class="slot">
                <div class="slot-info">
                    <p class="time">Time: ${slot.time}</p>
                    <p class="slot-count">* ${slot.available ? `${slot.slotsRemaining} Slots Remaining` : "No Slots Remaining"}</p>
                </div>
                <button class="btn ${slot.available ? "active" : "disabled"}" ${!slot.available ? "disabled" : ""}>
                    ${slot.available ? "Book" : "Full"}
                </button>
            </div>
        `).join("");
}

function populateReviews(activityData) {
    document.getElementById("reviewsContainer").innerHTML = activityData.reviews
        .map((review) => `
            <div class="review">
                <img src="${review.userAvatar}" alt="${review.userName}">
                <div class="review-content">
                    <p class="reviewer-name">${review.userName}</p>
                    <p class="review-rating">${generateStarRating(review.rating)}</p>
                    <p class="review-text">${review.comment}</p>
                    <p class="review-date">${new Date(review.date).toLocaleDateString()}</p>
                </div>
            </div>
        `).join("");
}

// Data Fetching
async function fetchActivityData(activityId) {
    try {
        await new Promise(resolve => setTimeout(resolve, 800));
        return allActivitiesData[activityId] || allActivitiesData[1];
    } catch {
        return allActivitiesData[activityId] || allActivitiesData[1];
    }
}

// Event Listeners - REMOVED NAVBAR FUNCTIONALITY
function initializeEventListeners(activityData) {
    setupPopupHandlers();
    setupBookingHandlers(activityData);
}

function setupPopupHandlers() {
    document.getElementById("openSlots").onclick = () =>
        document.getElementById("slotOverlay").classList.add("show");
    
    document.getElementById("closeOverlay").onclick = () =>
        document.getElementById("slotOverlay").classList.remove("show");

    document.querySelectorAll('.overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.classList.remove('show');
            }
        });
    });

    document.getElementById("closeBookPopup").onclick = () =>
        document.getElementById("bookSlotOverlay").classList.remove("show");
}

function setupBookingHandlers(activityData) {
    function initializeBookingButtons() {
        document.querySelectorAll(".btn.active").forEach((btn) => {
            btn.onclick = (e) => {
                const slotElement = e.target.closest(".slot");
                const time = slotElement.querySelector(".time").textContent.replace("Time: ", "");
                const slot = activityData.timeSlots.find((s) => s.time === time);

                document.getElementById("slotOverlay").classList.remove("show");
                document.getElementById("bookSlotOverlay").classList.add("show");

                document.getElementById("selectedTime").textContent = `Time : ${time}`;
                document.getElementById("slotsRemainingText").textContent = `* ${slot.slotsRemaining} Slots Remaining`;

                document.getElementById("slotInput").value = "";
                document.getElementById("extraInfo").value = "";

                document.getElementById("confirmBook").onclick = () => {
                    const count = parseInt(document.getElementById("slotInput").value);
                    const extra = document.getElementById("extraInfo").value;

                    if (!count || count <= 0 || count > slot.slotsRemaining) {
                        alert(`Please enter a valid number of slots (1-${slot.slotsRemaining})`);
                        return;
                    }

                    alert(`✅ Booking Confirmed!\nActivity: ${activityData.title}\nTime: ${time}\nSlots: ${count}\nExtra: ${extra}`);
                    document.getElementById("bookSlotOverlay").classList.remove("show");
                };

                document.getElementById("cancelBook").onclick = () =>
                    document.getElementById("bookSlotOverlay").classList.remove("show");
            };
        });
    }

    setTimeout(initializeBookingButtons, 100);
}

// Main Application
async function loadActivityData() {
    const urlParams = new URLSearchParams(window.location.search);
    const activityId = urlParams.get("id") || 1;
    
    try {
        const activityData = await fetchActivityData(parseInt(activityId));
        populateActivityDetails(activityData);
        initializeEventListeners(activityData);
    } catch (error) {
        console.error("Error loading activity data:", error);
        document.getElementById("activityTitle").textContent = "Error loading activity";
        document.getElementById("activityDescription").textContent = "Sorry, we couldn't load the activity details. Please try again later.";
    }
}

// Initialize
document.addEventListener("DOMContentLoaded", loadActivityData);
