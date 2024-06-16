

const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = document.querySelector('.nxt-btn');
const preBtn = document.querySelector('.pre-btn');
const header = document.querySelector('header');
    document.addEventListener('DOMContentLoaded', (event) => {
        const userIconContainer = document.querySelector('.user-icon-container');
        const userDropdown = document.querySelector('.user-dropdown');

        userIconContainer.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from propagating to document
            userDropdown.classList.toggle('show');

            // Adjust the position of the dropdown if it overflows the viewport
            const dropdownRect = userDropdown.getBoundingClientRect();
            const viewportWidth = window.innerWidth;

            if (dropdownRect.right > viewportWidth) {
                userDropdown.style.right = 'auto';
                userDropdown.style.left = '0';
            }
        });

    // Hide the dropdown when clicking outside
    document.addEventListener('DOMContentLoaded', (event) => {
        const userIconContainer = document.querySelector('.user-icon-container');
        const userDropdown = document.querySelector('.user-dropdown');
    
        userIconContainer.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from propagating to document
            userDropdown.classList.toggle('show');
    
            // Adjust the position of the dropdown if it overflows the viewport
            const dropdownRect = userDropdown.getBoundingClientRect();
            const viewportWidth = window.innerWidth;
    
            if (dropdownRect.right > viewportWidth) {
                userDropdown.style.right = 'auto';
                userDropdown.style.left = '0';
            }
        });
    
        // Hide the dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userIconContainer.contains(event.target)) {
                userDropdown.classList.remove('show');
            }
        });
    });
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        const scrollPosition = window.scrollY || window.pageYOffset;
    
        if (scrollPosition > 0) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });


let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
};

productContainers.forEach((item) => {
    let isAnimating = false; // Flag to prevent multiple animations
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    let scrollAmount = containerWidth / 4; // Adjust the scroll amount as needed

    const smoothScroll = (amount) => {
        if (!isAnimating) {
            isAnimating = true;
            let start = null;
            let currentPos = item.scrollLeft;
            const animation = (timestamp) => {
                if (!start) start = timestamp;
                const elapsed = timestamp - start;
                const progress = Math.min(1, elapsed / 1000); // Adjust the animation duration (1000ms)
                item.scrollLeft = currentPos + amount * progress;
                if (progress < 1) {
                    window.requestAnimationFrame(animation);
                } else {
                    isAnimating = false;
                }
            };
            window.requestAnimationFrame(animation);
        }
    };

    nxtBtn.addEventListener('click', () => {
        smoothScroll(scrollAmount);
    });

    preBtn.addEventListener('click', () => {
        smoothScroll(-scrollAmount);
    });
});

// Function to add smooth scrolling behavior to anchor links
function smoothScroll(target, duration) {
    var targetElement = document.querySelector(target);
    var targetPosition = targetElement.getBoundingClientRect().top;
    var startPosition = window.pageYOffset || window.scrollY;
    var startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var run = ease(timeElapsed, startPosition, targetPosition, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    function ease(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
}

// Smooth scroll to the target section when clicking on the down arrow
document.querySelector('.down').addEventListener('click', function() {
    smoothScroll('#trending', 1000); // Adjust duration as needed
});

// New functionality for the "+" and "-" buttons
document.addEventListener("DOMContentLoaded", function() {
    const quantityControls = document.querySelectorAll('.quantity-control');

    quantityControls.forEach(control => {
        const minusButton = control.querySelector('button:first-child');
        const plusButton = control.querySelector('button:last-child');
        const quantityInput = control.querySelector('input');

        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateSubtotal(control);
            }
        });

        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateSubtotal(control);
        });
    });

    function updateSubtotal(control) {
        const row = control.closest('tr');
        const priceElement = row.querySelector('td:nth-child(2)');
        const subtotalElement = row.querySelector('td:nth-child(4)');
        const quantityInput = control.querySelector('input');
        const price = parseFloat(priceElement.textContent.replace('₱', '').replace(',', ''));
        const quantity = parseInt(quantityInput.value);
        const subtotal = price * quantity;
        subtotalElement.textContent = `₱${subtotal.toFixed(2)}`;
        updateCartSummary();
    }

    function updateCartSummary() {
        const subtotalElements = document.querySelectorAll('.cart-table tbody tr td:nth-child(4)');
        let total = 0;
        subtotalElements.forEach(subtotalElement => {
            const subtotal = parseFloat(subtotalElement.textContent.replace('₱', '').replace(',', ''));
            total += subtotal;
        });
        document.querySelector('.cart-summary p').textContent = `₱${total.toFixed(2)}`;
    }
});
})
document.addEventListener('DOMContentLoaded', (event) => {
    const userIconContainer = document.querySelector('.user-icon-container');
    const userDropdown = document.querySelector('.user-dropdown');

    // Initially hide the dropdown
    userDropdown.style.display = 'none';

    userIconContainer.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent click from propagating to document

        // Toggle the visibility of the dropdown
        if (userDropdown.style.display === 'none') {
            userDropdown.style.display = 'block';
        } else {
            userDropdown.style.display = 'none';
        }

        // Adjust the position of the dropdown if it overflows the viewport
        const dropdownRect = userDropdown.getBoundingClientRect();
        const viewportWidth = window.innerWidth;

        if (dropdownRect.right > viewportWidth) {
            userDropdown.style.right = 'auto';
            userDropdown.style.left = '0';
        }
    });

    // Hide the dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!userIconContainer.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.style.display = 'none';
        }
    });
});