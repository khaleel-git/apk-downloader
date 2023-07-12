var lookup = {
   'Option 1': ['Option 1 - Choice 1', 'Option 1 - Choice 2', 'Option 1 - Choice 3'],
   'Option 2': ['Option 2 - Choice 1', 'Option 2 - Choice 2'],
   'Option 3': ['Option 3 - Choice 1'],
};

// When an option is changed, search the above for matching choices
$('#options').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#choices').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#choices').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }
});