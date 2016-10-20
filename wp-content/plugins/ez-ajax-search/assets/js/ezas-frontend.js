jQuery(document).ready(function($) {
	var last_terms = [];
	var searching  = false;
	var xhr        = null;

	var EZAS = {
		init: function() {
			var $wrapper = $(".ezas-wrapper");
			if ($wrapper.length < 1) return;

			// iterate wrappers
			$wrapper.each(function() {
				var _wrapper   = $(this);
				var settings   = $(this).data("settings");

				var $input = $(this).find("input[name='s']");
				if ($input.length < 1 && ezas_vars.debug_mode == 1) console.log("ez Ajax Search: unable to find search input field.");

				$input.on("change keyup", function() {
					var search_text = $input.val();

					// check for minimum length and prevent searching twice
					if (search_text.length < settings.min_length ||
						(last_terms[settings.id] && last_terms[settings.id] == search_text)) {
						return;
					}

					last_terms[settings.id] = search_text;
					EZAS.get_results(_wrapper, search_text, settings);
				});
			});

			// bind mouseclick
			$("body").on("click", function() {
				EZAS.clear_results();
			});
		},

		clear_results: function($wrapper) {
			var $results = $(".ezas-visible");

			if ($wrapper) {
				$results = $wrapper.find(".ezas-visible");
			}

			$results.removeClass("ezas-visible").text("");
		},

		get_results: function($wrapper, text, settings) {
			// stop request if already sent
			if (xhr) xhr.abort();

			// clear results
			EZAS.clear_results($wrapper);

			// show searching text
			$wrapper.find(".ezas-searching").show();

			var data = "id=" + settings.id + "&search=" + encodeURIComponent(text);

			xhr = $.ajax({
				type: "post",
				url: ezas_vars.ajaxurl,
				cache: settings.caching,
				data: {
					action: "ezas_frontend",
					data: data
				},
				success: function(response) {
					xhr = null;

					if (ezas_vars.debug_mode == 1) console.log(response);
					
					if (!response) {
						if (ezas_vars.debug_mode == 1) console.log("ez Ajax Search: no response.");

						return;
					}

					EZAS.show_result($wrapper, response);
				}
			});
		},

		show_result: function($wrapper, result) {
			// hide searching text
			$wrapper.find(".ezas-searching").hide();

			// show results
			$wrapper.find(".ezas-results").addClass("ezas-visible").html(result);
		}
	};

	EZAS.init();
});