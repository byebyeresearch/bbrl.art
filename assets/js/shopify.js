let App = function (productId = null, productPrice = null) {

  // Launch the shopify library
  if (window.ShopifyBuy && window.ShopifyBuy.UI) {
    ShopifyBuyInit();
  }

  // Initialize the buy button
  function ShopifyBuyInit() {
    var client = ShopifyBuy.buildClient({
      domain: 'timstaana.myshopify.com',
      storefrontAccessToken: '02774a0d1d9940eb1dbb6e6f61801fba',
    });

    // Set up the button
    ShopifyBuy.UI.onReady(client).then(function (ui) {

      // Configurations
      var Config = {

        // Product button
        "product": {
          "iframe": false,
          "variantId": "all",
          "width": "auto",
          "contents": {
            "img": false,
            "imgWithCarousel": false,
            "title": false,
            "variantTitle": false,
            "price": false,
            "description": false,
            "buttonWithQuantity": false,
            "quantity": false
          },
          "text": {
            button: 'Add to Cart',
            outOfStock: 'Out of stock',
            unavailable: 'Unavailable',
          },
        },

        // Cart Config
        "cart": {
          "iframe": false,
          "popup": false,
          "contents": {
            "button": true,
            "img": true
          },
          "text": {
            "title": 'Cart',
            "empty": 'Your cart is empty.',
            "button": 'Checkout',
            "total": 'Total',
            "notice": 'Shipping and discount codes are added at checkout.',
            "noteDescription": 'Special instructions for seller',
          }
        },

        // Cart toggle button
        "toggle": {
          "iframe": false,
          "sticky": false,
          "count": true,
          "icon": false,
          "title": false,
          "text": {
            "title": '',
          },
          "contents": {
            "prefix": true,
            "suffix": true,
          },
          "templates": {
            "prefix": '<button aria-label="View Cart">Cart (',
            "suffix": ')</button>'
          },
          "order": [
            'prefix',
            'count',
            'suffix',
            
          ],      
        },

        // Cart Product config
        "lineItem": {
          "contents": {
            "image": true
          },
        },
      };

      // set the button price

      if (productId !== null) {

        // Instantiate the components
        ui.createComponent('product', {

          id: [productId],
          node: document.querySelector("[data-product]"),
          toggles: [{
            node: document.querySelector("[data-cart]")
          }],
          moneyFormat: '%24%7B%7Bamount%7D%7D',

          // Components Options
          options: {
            "product": Config.product,
            "cart": Config.cart,
            "lineItem": Config.lineItem,
            "toggle": Config.toggle
          }
        });
      }
    });
  }
};