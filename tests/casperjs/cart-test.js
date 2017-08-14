casper.test.begin('Add to cart and checkout', 8, function suite(test) {
    
    casper.options.viewportSize = { width: 1920, height: 1080 };
    
    // Open webquote for 22FSLL
    casper.start("http://www.replacements.com/webquote/22fsll.htm", function() {
        //test.assertTitle("Google", "google homepage title is the one expected");
        test.assertExists('.photoview_add_to_cart_S2638881G1', "SKU for Roswell Crash Dinner Plate (DPRC) exists");
    });
    
    // Add to cart
    casper.then(function() {
        // Verify element exists before clicking
        this.thenClick(".photoview_add_to_cart_S2638881G1 span");
    });
    
    // Verify add to cart worked
    casper.then(function() {

        var numberItemsInCart = this.evaluate(function() {
           return cart.getCartItems().length; 
        });
        test.assertEquals(numberItemsInCart, 1, "Number of items in cart is 1");
        
    });
    
    // Click on checkout button, navigate to cart
    casper.then(function() {
        this.click("#modal_checkout_links .checkout");
        
        this.waitForUrl("http://www.replacements.com/cart/");
    });
    
    // Verify on cart page
    casper.then(function() {
        //this.echo(this.getCurrentUrl());
        test.assertUrlMatch("http://www.replacements.com/cart/2", "Show cart page");
        //this.fill('form[action="/search"]', {
        //    q: "casperjs"
        //}, true);
    });
    
    // Assert there is 1 item displayed on the cart
    casper.then(function() {
        var numberCartItemsOnPage = this.evaluate(function() {
           return $(".row .cart_item").length; 
        });
        
        test.assertEquals(numberCartItemsOnPage, 1, "Number of cart items on cart page is 1");
    });
    
    // Click on checkout button, navigate to shipping page
    casper.then(function() {
        this.click(".submit");
    });
    
    // Verify on shipping page
    casper.then(function() {
        test.assertUrlMatch("https://www.replacements.com/order/ship.php", "Show shipping page");
    });
    
    // Fill in shipping page and submit
    casper.then(function() {
        this.fill("form", {
            "firstName": "test",
            "lastName": "test",
            "address_1": "test",
            "city": "test",
            "usa_states": "Alabama",
            "zip": "test"
        }, true);
        
        this.waitForUrl("https://www.replacements.com/order/review.php");
    });

    // Verify on review page
    casper.then(function() {
        test.assertUrlMatch("https://www.replacements.com/order/review.php", "Show review page");
    });
    
    // Fill in review page and submit
    casper.then(function() {
        this.fill("form", {
            "cc_number": "4444444444444448",
            "cc_expiration_month": "12",
            "cc_expiration_year": "2027",
            "cc_name_on_card": "test",
            "day_phone": "test"
        }, false);   

        // Click the submit button
        this.click(".submit");
        
        this.waitForUrl("http://www.replacements.com/cart/confirm.php");
    });

    // Verify on confirmation page
    casper.then(function() {
        test.assertUrlMatch("http://www.replacements.com/cart/confirm.php", "Show confirmation page");
    });
    
    // Verify cart items displayed on confirmation page
    casper.then(function() {
        var numberCartItemsOnPage = this.evaluate(function() {
           return $(".row .cart_item").length; 
        });
        
        test.assertEquals(numberCartItemsOnPage, 1, "Number of cart items on confirmation page is 1");
    });

    casper.run(function() {
        test.done();
    });
});