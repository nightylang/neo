 $(document).ready(function() {
     function debounce(func, delay) {
         let timeoutId;
         return function(...args) {
             clearTimeout(timeoutId);
             timeoutId = setTimeout(() => {
                 func.apply(this, args);
             }, delay);
         };
     }

     const handleSearchInput = function() {
         const inputVal = $(this).val();
         const resultDropdown = $(this).closest('.search-box').find('.result');

         if (inputVal.length) {
             resultDropdown.html('<p>Loading...</p>');

             $.get("backend-search.php", { term: inputVal })
                 .done(function(data) {
                     resultDropdown.html(data);
                 })
                 .fail(function() {
                     resultDropdown.html('<p style="color: red;">Error: Could not fetch results.</p>');
                 });
         } else {
             resultDropdown.empty();
         }
     };

     const debouncedSearchHandler = debounce(handleSearchInput, 300);
     $('.search-box input[type="text"]').on("keyup input", debouncedSearchHandler);

     $(document).on("click", ".result p", function() {
         $(this).closest(".search-box").find('input[type="text"]').val($(this).text());
         $(this).parent(".result").empty();
     });

     $(document).on('click', function(e) {
         if (!$(e.target).closest('.search-box').length) {
             $('.result').empty();
         }
     });

 });