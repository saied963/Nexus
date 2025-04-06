document.addEventListener('DOMContentLoaded', function() {
    // Slider functionality
    let currentSlide = 0;
    const totalSlides = 3; // Imaginary number of slides
    
    document.querySelector('.arrow-left').addEventListener('click', function() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    });
    
    document.querySelector('.arrow-right').addEventListener('click', function() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    });
    
    function updateSlider() {
        // In a real implementation, this would change the visible slide
        console.log('Current slide:', currentSlide);
        // Example: document.querySelector('.slider-content').style.transform = `translateX(-${currentSlide * 100}%)`;
    }
    
    // Make category cards interactive
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            console.log('Selected category:', category);
            // Would navigate to category page in a real implementation
            // window.location.href = `category.php?name=${category}`;
        });
    });
    
    // Make product cards interactive
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            console.log('Selected product ID:', productId);
            // Would navigate to product page in a real implementation
            // window.location.href = `product.php?id=${productId}`;
        });
    });
    
    // Shopping cart functionality (simplified)
    let cartCount = 0;
    const cartIcon = document.querySelector('.user-menu .icon:nth-child(2)');
    
    function updateCart() {
        // In a real implementation, this would update the cart icon and potentially show a dropdown
        console.log('Cart items:', cartCount);
    }
    
    // Example function to add item to cart (would be called when "Add to Cart" buttons are clicked)
    function addToCart(productId, quantity = 1) {
        cartCount += quantity;
        updateCart();
        console.log(`Added product ${productId} to cart (${quantity} items)`);
        // In a real implementation, this would use AJAX to update the cart in the session
    }
    
    // For demonstration, clicking the cart icon shows the count
    cartIcon.addEventListener('click', function() {
        alert(`Winkelwagen: ${cartCount} items`);
    });
});