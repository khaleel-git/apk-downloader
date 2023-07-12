// Map your choices to your option value
var lookup = {
   '4.4': ['cwv88s', 'fresh', 'JP-1601', 'm201', 'Tab_8_4C'],
   '5': ['t00q'],
   '5.1': ['sloane'],
   '6': ['cloudbook', 'fs454', 'maguro', 'nxtl09', 'wetekplay2'],
   '7': ['BRAVIA_ATV2', 'gts3llte'],
   '7.1': ['aries', 'bacon', 'bbb100', 'fp2','gtp7510', 'honami', 'K013_1', 'm3xx', 'mako' ],
   '8.0': ['crackling'],
   '8.1': ['angler', 'bullhead', 'foster', 'gemini','hammerhead', 'hero2lte', 'kenzo', 'manta', 'oneplus3', 'sailfish', 'shamu'],
   '9': ['walleye'],
};

// When an option is changed, search the above for matching choices
$('#android_version').on('change', function() {
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