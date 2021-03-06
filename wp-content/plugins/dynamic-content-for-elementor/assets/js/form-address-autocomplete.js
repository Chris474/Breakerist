"use strict";
function initializeAutocompleteFields($form) {
	const $outWrapper = $form.find('.elementor-form-fields-wrapper');
	let autocompleteFields = $outWrapper.attr('data-autocomplete-fields');
	if (autocompleteFields === undefined) {
		return; // no autocomplete fields.
	}
	autocompleteFields = JSON.parse(autocompleteFields);
	for (let field of autocompleteFields) {
		let el = $form.find(`[name=form_fields\\[${field.id}\\]]`)[0];
		let autocomplete = new google.maps.places.Autocomplete(el, {types: ['geocode']});
		autocomplete.setFields(['address_component']);
		if (field.country !== undefined) {
			autocomplete.setComponentRestrictions({country: field.country});
		}
	}
}

jQuery(window).on('elementor/frontend/init', function() {
	elementorFrontend.hooks.addAction('frontend/element_ready/form.default', initializeAutocompleteFields);
});
