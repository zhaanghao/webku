( function( api ) {

	// Extends our custom "fast-food-delivery" section.
	api.sectionConstructor['fast-food-delivery'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );