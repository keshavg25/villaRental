

const lenis = new Lenis()
lenis.on('scroll', ScrollTrigger.update)
gsap.ticker.add((time)=>{
    lenis.raf(time * 1000)
})
gsap.ticker.lagSmoothing(0)
const bookBtns = document.querySelectorAll(".book-btn");
// const bookContainer = document.querySelector(".mainGallery");
const loginBtn = document.querySelector(".loginbtn");
const loginWrapper = document.querySelector(".loginWrapper");
const buttonclose = document.querySelector(".buttonclose");
const secondClose = document.querySelector(".buttonclose2");
const Face1btn = document.getElementById("face1btn");
const Face2btn = document.getElementById("face2btn");
const Face1 = document.getElementById("face1");
const Face2 = document.getElementById("face2");
// const buttoncloselast = document.getElementById("buttoncloselast");
const site1 = document.getElementById("site1");
const site2 = document.getElementById("site2");
const site3 = document.getElementById("site3");
const map1 = document.getElementById("map1");
const map2 = document.getElementById("map2");
const map3 = document.getElementById("map3");
const buttonclosegallery = document.querySelector(".buttonclosegallery");
// const galleryopenerbtn = document.querySelectorAll(".galleryopener");

const scrollIndicator = document.getElementById('scroll-indicator');

  
window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      scrollIndicator.style.opacity = '0';
      scrollIndicator.style.pointerEvents = 'none';
    } else {
      scrollIndicator.style.opacity = '1';
      scrollIndicator.style.pointerEvents = 'auto';
    }
  });

// 🔹 Open & Close Booking Container

function openBookingContainer(id) {
    const bookContainer = document.querySelector(id);
    bookContainer.style.zIndex = "99";
    bookContainer.style.opacity = "1";
    bookContainer.style.transition = "opacity 0.4s ease-in-out";

    localStorage.setItem("BookingContainer",id);
}

function closeBookingContainer(id) {
    const bookContainer = document.querySelector(id);
    bookContainer.style.opacity = "0";
    bookContainer.style.transition = "opacity 0.4s ease-in-out";
    setTimeout(() => {
        bookContainer.style.zIndex = "-1";
    }, 400);

    localStorage.removeItem("BookingContainer");
}

// 📅 Date Picker Console Log
const datePicker = document.getElementById("date-picker");
if (datePicker) {
    datePicker.addEventListener("change", function () {
        console.log("Selected date: ", this.value);
    });
}


window.onload= function ()
{
    const bookingContainerId = localStorage.getItem("BookingContainer");
    if(bookingContainerId)
    {
        const bookContainer = document.querySelector(bookingContainerId);
        if(bookerr!=null || booksuc!=null){
            bookContainer.style.zIndex = "99";
            bookContainer.style.opacity = "1";
            bookContainer.style.transition = "opacity 0.4s ease-in-out";
        }
    }
    if(localStorage.loginWrapper=="open" && user==null)
    {
        loginWrapper.style.zIndex = "999";
        loginWrapper.style.opacity = "1";
        loginWrapper.style.transition = "opacity 0.4s ease-in-out";
    }
}

// 🔹 Login Modal Open & Close
function openLoginModal() {
    loginWrapper.style.zIndex = "999";
    loginWrapper.style.opacity = "1";
    loginWrapper.style.transition = "opacity 0.4s ease-in-out";
    localStorage.setItem("loginWrapper","open");
}

function closeLoginModal() {
    loginWrapper.style.opacity = "0";
    loginWrapper.style.transition = "opacity 0.4s ease-in-out";
    setTimeout(() => {
        loginWrapper.style.zIndex = "-1";
    }, 400);
    localStorage.removeItem("loginWrapper");

}


if (loginBtn) loginBtn.addEventListener("click", openLoginModal);
if (buttonclose) buttonclose.addEventListener("click", closeLoginModal);
if (secondClose) secondClose.addEventListener("click", closeLoginModal);

// 🔹 Face1 ↔ Face2 Transition
function toggleFaces(showFace2) {
    if (showFace2) {
        Face2.style.right = "34%";
        Face2.style.opacity = 1;
        Face1.style.left = "-200%";
    } else {
        Face1.style.left = "0";
        Face2.style.right = "-200%";
    }
    Face1.style.transition = "all 1s ease-in-out";
    Face2.style.transition = "all 1s ease-in-out";
}

if (Face1btn && Face2btn) {
    Face1btn.addEventListener("click", () => toggleFaces(true));
    Face2btn.addEventListener("click", () => toggleFaces(false));
}

// 🔹 Google Maps Animation (Slide Effect)
function showMap(selectedMap) {
    const maps = [map1, map2, map3];

    maps.forEach((map) => {
        gsap.to(map, {
            x: map === selectedMap ? "0%" : "-100%",
            opacity: map === selectedMap ? 1 : 0,
            duration: 0.5,
            zIndex: map === selectedMap ? 1 : 0,
        });
    });
}



//Ensure only the first map is visible initially
gsap.set(map1, { x: "0%", opacity: 1, zIndex: 1 });
gsap.set([map2, map3], { x: "100%", opacity: 0, zIndex: 0 });

if (site1) site1.addEventListener("click", () => showMap(map1));
if (site2) site2.addEventListener("click", () => showMap(map2));
if (site3) site3.addEventListener("click", () => showMap(map3));

// Initial animations for the navbar and other elements
const tl = gsap.timeline({});
tl.from(".navelems , .LoginBtnAnimDiv", {
    y: -50,
    opacity: 0,
    stagger: 0.2,
    duration: 1
});

tl.from(".calendar-container,.date-picker,.date-picker2,.city-select,.foranim", {
    scale: 0,
    opacity: 0,
    stagger: 0.2,
    duration: 1
});

gsap.registerPlugin(ScrollTrigger); 


const footerTl = gsap.timeline({
    scrollTrigger: {
        trigger: "footer", 
        start: "top 44%",
        end: "top 50%",
        scrub: 2, 
    }
});

footerTl.from(".footerleft,.footerhead,.one,.two,.map", {
    x: -200,
    opacity: 0,
    stagger: 0.3,
    duration: 1
});

document.querySelectorAll('.slider-container').forEach(container => {
    let slideIndex = 0;
    const slides = container.querySelector('.slides');
    const slideItems = container.querySelectorAll('.slide');
    const totalSlides = slideItems.length;
    const dotsContainer = container.querySelector('.dots');

    // Create dots dynamically
    slideItems.forEach((_, i) => {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dot.addEventListener('click', () => showSlide(i));
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('.dot');

    function showSlide(index) {
        slideIndex = index;
        if (slideIndex >= totalSlides) slideIndex = 0;
        if (slideIndex < 0) slideIndex = totalSlides - 1;
        slides.style.transform = `translateX(${-slideIndex * 100}%)`;
        updateDots();
    }

    function updateDots() {
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === slideIndex);
        });
    }

    container.querySelector('button:nth-of-type(1)').addEventListener('click', () => showSlide(slideIndex - 1)); // prev
    container.querySelector('button:nth-of-type(2)').addEventListener('click', () => showSlide(slideIndex + 1)); // next

    showSlide(slideIndex);

    // Optional: Auto-slide every 10 seconds
    setInterval(() => {
        showSlide(slideIndex + 1);
    }, 10000);
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".mainGallery").forEach(gallery => {
        const checkInDate = gallery.querySelector('.checkInBookingInput');
        const checkOutDate = gallery.querySelector('.checkOutBookingInput');
        const nightStand = gallery.querySelector('.nightStand');
        const ActualPrice = gallery.querySelector('.ActualPrice');
        const Tdiscount = gallery.querySelector('.TotalDiscount');
        const finalAmt = gallery.querySelector('.finalAmt');
        const finalAmtInput = gallery.querySelector('.finalAmtInput');

        const oldPrice = parseInt(gallery.querySelector('.old-price').textContent.replace(/[^\d]/g, ""));
        const newPrice = parseInt(gallery.querySelector('.new-price').textContent.replace(/[^\d]/g, ""));
        const discountAmtPerNight = oldPrice - newPrice;

        // Create error element
        const errorElement = document.createElement('div');
        errorElement.className = 'booking-error-message';
        errorElement.style.color = 'red';
        errorElement.style.marginTop = '5px';
        checkOutDate.parentNode.insertBefore(errorElement, checkOutDate.nextSibling);

        // Disable past dates
        const today = new Date().toISOString().split("T")[0];
        checkInDate.setAttribute("min", today);
        checkOutDate.setAttribute("min", today);

        function resetBillingInfo() {
            nightStand.textContent = "1";
            ActualPrice.textContent = `₹${oldPrice}`;
            Tdiscount.textContent = `-₹${discountAmtPerNight}`;
            finalAmt.textContent = `₹${oldPrice - discountAmtPerNight}`;
            if (finalAmtInput) finalAmtInput.value = oldPrice - discountAmtPerNight;
        }

        function calculateBilling() {
            errorElement.textContent = '';

            if (!checkInDate.value || !checkOutDate.value) {
                resetBillingInfo();
                return;
            }

            const inDate = new Date(checkInDate.value);
            const outDate = new Date(checkOutDate.value);

            if (outDate <= inDate) {
                errorElement.textContent = 'Error: Check-out date must be after check-in date';
                checkInDate.value = '';
                checkOutDate.value = '';
                resetBillingInfo();
                return;
            }

            const timeDiff = outDate.getTime() - inDate.getTime();
            const days = Math.ceil(timeDiff / (1000 * 3600 * 24));
            const totalBase = days * oldPrice;
            const totalDiscount = days * discountAmtPerNight;
            const finalTotal = totalBase - totalDiscount;

            nightStand.textContent = days;
            ActualPrice.textContent = `₹${totalBase}`;
            Tdiscount.textContent = `-₹${totalDiscount}`;
            finalAmt.textContent = `₹${finalTotal}`;

            if (finalAmtInput) finalAmtInput.value = finalTotal;
        }

        checkInDate.addEventListener("change", calculateBilling);
        checkOutDate.addEventListener("change", calculateBilling);

        // Set default billing
        resetBillingInfo();
    });
});

function openReviewModal(id) {
    const reviewContainer= document.querySelector(id);
    reviewContainer.style.display = "flex";
}

function closeReviewModal(id) {
    const reviewContainer= document.querySelector(id);
    reviewContainer.style.display = "none";
}

const questions = document.querySelectorAll('.faq-question');

questions.forEach((question) => {
    question.addEventListener('click', () => {
    const answer = question.nextElementSibling;
    const icon = question.querySelector('span');

    if (answer.style.height) {
        // Close
        answer.style.height = null;
        answer.classList.remove('open');
        icon.textContent = '+';
    } else {
        // Close all
        document.querySelectorAll('.faq-answer').forEach(a => {
        a.style.height = null;
        a.classList.remove('open');
        });
        document.querySelectorAll('.faq-question span').forEach(i => i.textContent = '+');

        // Open clicked
        answer.style.height = answer.scrollHeight + "px";
        answer.classList.add('open');
        icon.textContent = '−';
    }
    });
});


const wrapper = document.getElementById('testimonialWrapper');
const card = wrapper.querySelector('.testimonial-card');
const cardWidth = card.offsetWidth + parseInt(getComputedStyle(card).marginRight);
const visibleCards = 3;
let currentIndex = 0;

const updateTransform = () =>
(wrapper.style.transform = `translateX(${-cardWidth * currentIndex}px)`);

const prevReview = () => currentIndex > 0 && (currentIndex--, updateTransform());
const nextReview = () =>
currentIndex < wrapper.children.length - visibleCards &&
(currentIndex++, updateTransform());