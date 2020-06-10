var swiper = null;

var formatter = new Intl.NumberFormat("en-ZA", {
	style: "currency",
	currency: "ZAR",
});

$(document).ready(function () {
	// Home Page - Initialize UI
	// $("#browser").hide();

	// Home Page - Hide Welcome & Show Browser
	// $("#browse").click(function () {
	//   $("#intro").hide();
	//   $("#browser").show();
	// })

	// Admin Dahsboard - Hide image Messages
	$("#uploadFeaturedImageMsg").hide();
	$("#uploadGalleryImage1Msg").hide();
	$("#uploadGalleryImage2Msg").hide();
	$("#uploadGalleryImage3Msg").hide();
	$("#uploadGalleryImage4Msg").hide();
	$("#uploadGalleryImage5Msg").hide();
	$("#uploadGalleryImage6Msg").hide();
	$("#uploadGalleryImage7Msg").hide();
	$("#uploadGalleryImage8Msg").hide();
	$("#uploadGalleryImage9Msg").hide();
	$("#uploadGalleryImage10Msg").hide();
	$("#uploadGalleryImage11Msg").hide();
	$("#uploadGalleryImage12Msg").hide();

	// Admin Dashboard - Hide User Update, Cancel
	$("#updateDesignSubmit").hide();
	$("#updateDesignCancel").hide();

	$("#updateUserCancel").hide();
	$("#updateUserCancel").hide();

	// Contact Form - Hide Close Button, Thanks
	$("#contactRequestClose").hide();
	$("#contactRequestThanks").hide();

	let screenWidth = screen.width;
	let slidesCount = 1;

	if (screenWidth >= 550) {
		slidesCount = "auto";
	}

	if (typeof homepage !== "undefined") {
		swiper = new Swiper(".swiper-container", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: slidesCount,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: true,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	}

	// Admin Sign In
	$("#adminSignIn").on("click", function () {
		let username = $("#adminUsername").val();
		let password = $("#adminPassword").val();

		$.ajax({
			url: "../server/users/getUserLogin.php",
			type: "POST",
			data: {
				username: username,
				password: password,
			},
			success: function (res) {
				res = JSON.parse(res);
				switch (res.status) {
					case "Invalid Parameter":
						alert("Sign In Failed: one or more fields are empty!");
						break;
					case "Invalid Information":
						alert(
							"Sign In Failed: username or password is incorrect!"
						);
						break;
					case "Success":
						localStorage.setItem("ID", res.body.id);
						window.location.href = "dashboard.php";
						break;
				}
			},
			error: function (err) {
				alert(
					"Server Error: We couldn't establish a connection to the server."
				);
				console.log("Server Error Details: " + err.statusText);
			},
		});
	});

	// Admin Sign Out
	$("#adminSignOut").on("click", function () {
		localStorage.removeItem("ID");
		window.location.href = "index.php";
	});

	// Home Page - Filter Design Click
	$("#filterDesignsButton").on("click", function () {
		getFilteredDesigns();
	});

	// Home Page - View Details Click
	$(document).on("click", ".view-details", function () {
		let id = $(this).attr("id");
		getDesignDetails(id);
	});

	// Admin Dashboard - Add Design Save
	$("#addDesignSave").on("click", function () {
		addDesign();
	});

	// Admin Dashboard - Upload Featured Image
	$(document).on("change", "#uploadFeaturedImage", function () {
		$("#uploadFeaturedImageMsg").show();
		uploadImage("uploadFeaturedImage", "addDesignFeaturedImage");
	});

	// Admin Dashboard - Upload Gallery Image 1
	$(document).on("change", "#uploadGalleryImage1", function () {
		$("#uploadGalleryImage1Msg").show();
		uploadImage("uploadGalleryImage1", "addDesignGalleryImage1");
	});

	// Admin Dashboard - Upload Gallery Image 2
	$(document).on("change", "#uploadGalleryImage2", function () {
		$("#uploadGalleryImage2Msg").show();
		uploadImage("uploadGalleryImage2", "addDesignGalleryImage2");
	});

	// Admin Dashboard - Upload Gallery Image 3
	$(document).on("change", "#uploadGalleryImage3", function () {
		$("#uploadGalleryImage3Msg").show();
		uploadImage("uploadGalleryImage3", "addDesignGalleryImage3");
	});

	// Admin Dashboard - Upload Gallery Image 4
	$(document).on("change", "#uploadGalleryImage4", function () {
		$("#uploadGalleryImage4Msg").show();
		uploadImage("uploadGalleryImage4", "addDesignGalleryImage4");
	});

	// Admin Dashboard - Upload Gallery Image 5
	$(document).on("change", "#uploadGalleryImage5", function () {
		$("#uploadGalleryImage5Msg").show();
		uploadImage("uploadGalleryImage5", "addDesignGalleryImage5");
	});

	// Admin Dashboard - Upload Gallery Image 6
	$(document).on("change", "#uploadGalleryImage6", function () {
		$("#uploadGalleryImage6Msg").show();
		uploadImage("uploadGalleryImage6", "addDesignGalleryImage6");
	});

	// Admin Dashboard - Upload Gallery Image 7
	$(document).on("change", "#uploadGalleryImage7", function () {
		$("#uploadGalleryImage7Msg").show();
		uploadImage("uploadGalleryImage7", "addDesignGalleryImage7");
	});

	// Admin Dashboard - Upload Gallery Image 8
	$(document).on("change", "#uploadGalleryImage8", function () {
		$("#uploadGalleryImage8Msg").show();
		uploadImage("uploadGalleryImage8", "addDesignGalleryImage8");
	});

	// Admin Dashboard - Upload Gallery Image 9
	$(document).on("change", "#uploadGalleryImage9", function () {
		$("#uploadGalleryImage9Msg").show();
		uploadImage("uploadGalleryImage9", "addDesignGalleryImage9");
	});

	// Admin Dashboard - Upload Gallery Image 10
	$(document).on("change", "#uploadGalleryImage10", function () {
		$("#uploadGalleryImage10Msg").show();
		uploadImage("uploadGalleryImage10", "addDesignGalleryImage10");
	});

	// Admin Dashboard - Upload Gallery Image 11
	$(document).on("change", "#uploadGalleryImage11", function () {
		$("#uploadGalleryImage11Msg").show();
		uploadImage("uploadGalleryImage11", "addDesignGalleryImage11");
	});

	// Admin Dashboard - Upload Gallery Image 12
	$(document).on("change", "#uploadGalleryImage12", function () {
		$("#uploadGalleryImage12Msg").show();
		uploadImage("uploadGalleryImage12", "addDesignGalleryImage12");
	});

	// Admin Dashboard - Edit Design
	$(document).on("click", ".edit-design", function () {
		let id = $(this).attr("id");
		getAdminDesignDetails(id);
		$("#addDesignSave").hide();
		$("#active-designs-section").hide();
		$("#design-manager-form-title").text("Edit Design");
		$("#updateDesignSubmit").show();
		$("#updateDesignCancel").show();

		$("#updateDesignId").val(id);
	});

	// Admin Dashboard - Update Design Submit
	$("#updateDesignSubmit").on("click", function () {
		updateDesign();

		$("#addDesignSave").show();
		$("#active-designs-section").show();
		$("#design-manager-form-title").text("Add Design");
		$("#updateDesignSubmit").hide();
		$("#updateDesignCancel").hide();

		$("#addDesignTitle").val("");
		$("#addDesignDescription").val("");
		$("#addDesignIncluding").val("");
		$("#addDesignSize").val("");
		$("#addDesignBedrooms").val("");
		$("#addDesignBathrooms").val("");
		$("#addDesignFloors").val("");
		$("#addDesignGarage").val("");
		$("#addDesignKitchen").val("");
		$("#addDesignLounge").val("");
		$("#addDesignDining").val("");
		$("#addDesignPatio").val("");
		$("#addDesignWidth").val("");
		$("#addDesignDepth").val("");
		$("#addDesignPrice").val("");
		$("#addDesignDiscount").val("");
		$("#addDesignFeaturedImage").text("");
		$("#uploadFeaturedImage").val("");
		$("#addDesignGalleryImage1").text("");
		$("#uploadGalleryImage1").val("");
		$("#addDesignGalleryImage2").text("");
		$("#uploadGalleryImage2").val("");
		$("#addDesignGalleryImage3").text("");
		$("#uploadGalleryImage3").val("");
		$("#addDesignGalleryImage4").text("");
		$("#uploadGalleryImage4").val("");
		$("#addDesignGalleryImage5").text("");
		$("#uploadGalleryImage5").val("");
		$("#addDesignGalleryImage6").text("");
		$("#uploadGalleryImage6").val("");
		$("#addDesignGalleryImage7").text("");
		$("#uploadGalleryImage7").val("");
		$("#addDesignGalleryImage8").text("");
		$("#uploadGalleryImage8").val("");
		$("#addDesignGalleryImage9").text("");
		$("#uploadGalleryImage9").val("");
		$("#addDesignGalleryImage10").text("");
		$("#uploadGalleryImage10").val("");
		$("#addDesignGalleryImage11").text("");
		$("#uploadGalleryImage11").val("");
		$("#addDesignGalleryImage12").text("");
		$("#uploadGalleryImage12").val("");

		$("#uploadFeaturedImageMsg").text("Loading...").hide();
		$("#uploadGalleryImage1Msg").text("Loading...").hide();
		$("#uploadGalleryImage2Msg").text("Loading...").hide();
		$("#uploadGalleryImage3Msg").text("Loading...").hide();
		$("#uploadGalleryImage4Msg").text("Loading...").hide();
		$("#uploadGalleryImage5Msg").text("Loading...").hide();
		$("#uploadGalleryImage6Msg").text("Loading...").hide();
		$("#uploadGalleryImage7Msg").text("Loading...").hide();
		$("#uploadGalleryImage8Msg").text("Loading...").hide();
		$("#uploadGalleryImage9Msg").text("Loading...").hide();
		$("#uploadGalleryImage10Msg").text("Loading...").hide();
		$("#uploadGalleryImage11Msg").text("Loading...").hide();
		$("#uploadGalleryImage12Msg").text("Loading...").hide();
	});

	// Admin Dashboard - Update Design Cancel
	$("#updateDesignCancel").on("click", function () {
		$("#addDesignSave").show();
		$("#active-designs-section").show();
		$("#design-manager-form-title").text("Add Design");
		$("#updateDesignSubmit").hide();
		$("#updateDesignCancel").hide();

		$("#addDesignTitle").val("");
		$("#addDesignDescription").val("");
		$("#addDesignIncluding").val("");
		$("#addDesignSize").val("");
		$("#addDesignBedrooms").val("");
		$("#addDesignBathrooms").val("");
		$("#addDesignFloors").val("");
		$("#addDesignGarage").val("");
		$("#addDesignKitchen").val("");
		$("#addDesignLounge").val("");
		$("#addDesignDining").val("");
		$("#addDesignPatio").val("");
		$("#addDesignWidth").val("");
		$("#addDesignDepth").val("");
		$("#addDesignPrice").val("");
		$("#addDesignDiscount").val("");
		$("#addDesignFeaturedImage").text("");
		$("#uploadFeaturedImage").val("");
		$("#addDesignGalleryImage1").text("");
		$("#uploadGalleryImage1").val("");
		$("#addDesignGalleryImage2").text("");
		$("#uploadGalleryImage2").val("");
		$("#addDesignGalleryImage3").text("");
		$("#uploadGalleryImage3").val("");
		$("#addDesignGalleryImage4").text("");
		$("#uploadGalleryImage4").val("");
		$("#addDesignGalleryImage5").text("");
		$("#uploadGalleryImage5").val("");
		$("#addDesignGalleryImage6").text("");
		$("#uploadGalleryImage6").val("");
		$("#addDesignGalleryImage7").text("");
		$("#uploadGalleryImage7").val("");
		$("#addDesignGalleryImage8").text("");
		$("#uploadGalleryImage8").val("");
		$("#addDesignGalleryImage9").text("");
		$("#uploadGalleryImage9").val("");
		$("#addDesignGalleryImage10").text("");
		$("#uploadGalleryImage10").val("");
		$("#addDesignGalleryImage11").text("");
		$("#uploadGalleryImage11").val("");
		$("#addDesignGalleryImage12").text("");
		$("#uploadGalleryImage12").val("");

		$("#uploadFeaturedImageMsg").text("Loading...").hide();
		$("#uploadGalleryImage1Msg").text("Loading...").hide();
		$("#uploadGalleryImage2Msg").text("Loading...").hide();
		$("#uploadGalleryImage3Msg").text("Loading...").hide();
		$("#uploadGalleryImage4Msg").text("Loading...").hide();
		$("#uploadGalleryImage5Msg").text("Loading...").hide();
		$("#uploadGalleryImage6Msg").text("Loading...").hide();
		$("#uploadGalleryImage7Msg").text("Loading...").hide();
		$("#uploadGalleryImage8Msg").text("Loading...").hide();
		$("#uploadGalleryImage9Msg").text("Loading...").hide();
		$("#uploadGalleryImage10Msg").text("Loading...").hide();
		$("#uploadGalleryImage11Msg").text("Loading...").hide();
		$("#uploadGalleryImage12Msg").text("Loading...").hide();
	});

	// Admin Dashboard - Delete Design
	$(document).on("click", ".delete-design", function () {
		let id = $(this).attr("id");
		deleteDesign(id);
	});

	// Admin Dashboard - Update Pricing
	$("#updatePricing").on("click", function () {
		updatePricing();
	});

	// Admin Dashboard - Add User
	$("#addUserSubmit").on("click", function () {
		addUser();
	});

	// Admin Dashboard - Edit User
	$(document).on("click", ".edit-user", function () {
		let id = $(this).attr("id");
		getUserDetails(id);
		$("#addUserSubmit").hide();
		$("#active-users-section").hide();
		$("#user-manager-form-title").text("Edit User");
		$("#updateUserSubmit").show();
		$("#updateUserCancel").show();

		$("#updateUserId").val(id);
	});

	// Admin Dashboard - Update User Submit
	$("#updateUserSubmit").on("click", function () {
		updateUser();

		$("#addUserSubmit").show();
		$("#active-users-section").show();
		$("#user-manager-form-title").text("Add User");
		$("#updateUserSubmit").hide();
		$("#updateUserCancel").hide();

		$("#addUserUsername").val("");
		$("#addUserPassword").val("");
		$("#addUserEmail").val("");
	});

	// Admin Dashboard - Update User Cancel
	$("#updateUserCancel").on("click", function () {
		$("#addUserSubmit").show();
		$("#active-users-section").show();
		$("#user-manager-form-title").text("Add User");
		$("#updateUserSubmit").hide();
		$("#updateUserCancel").hide();

		$("#addUserUsername").val("");
		$("#addUserPassword").val("");
		$("#addUserEmail").val("");
	});

	// Admin Dashboard - Delete User
	$(document).on("click", ".delete-user", function () {
		let id = $(this).attr("id");
		deleteUser(id);
	});

	// Contact Form Submit
	$("#contactRequestSubmit").on("click", function () {
		let contactName = $("#contactRequestName").val();
		let contactMail = $("#contactRequestEmail").val();
		let contactMesg = $("#contactRequestMessage").val();
		let recaptcha = $("input[data-recaptcha]").val();

		$.ajax({
			url: "server/contacts/addContact.php",
			type: "POST",
			data: {
				contactName: contactName,
				contactMail: contactMail,
				contactMesg: contactMesg,
				recaptcha: recaptcha,
			},
			success: function (res) {
				console.log(res);
				if (res === "Contact Added") {
					$("#contactRequestForm").hide();
					$("#contactRequestThanks").show();

					$("#contactRequestSubmit").hide();
					$("#contactRequestClose").show();
				} else {
					alert(
						"Contact Request Failed: one or more fields are empty"
					);
				}
			},
			error: function (err) {
				console.log(err);
			},
		});
	});

	// Payment Checkout - Accept Toggle
	$("#acceptCheckbox").change(function () {
		var isChecked = this.checked;
		$("#accepted").prop("disabled", !isChecked);
	});
}); // End Document.Ready

// Home Page - Get All/Filtered Designs
function getFilteredDesigns() {
	const filterSize = $("#filterSize").val();
	const filterBedrooms = $("#filterBedrooms").val();
	const filterBathrooms = $("#filterBathrooms").val();
	const filterFloors = $("#filterFloors").val();
	const filterWidth = $("#filterWidth").val();
	const filterDepth = $("#filterDepth").val();

	$("#designs-container").empty();

	$.ajax({
		url: "server/designs/getDesigns.php",
		type: "get",
		data: {
			filter: "true",
			size: filterSize,
			bedrooms: filterBedrooms,
			bathrooms: filterBathrooms,
			floors: filterFloors,
			width: filterWidth,
			depth: filterDepth,
		},
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.map(function (value, index) {
					$("#designs-container").append(
						`
            <div class="swiper-slide">
              <h5 class="text-center">` +
							value.title +
							`</h5>
              <a id="` +
							value.id +
							`"class="view-details"><img src="media/designs/` +
							value.featuredImage +
							`.jpg" class="img-fluid" alt="Design Featured Image" /></a>
              <h3 class="text-left m-3 text-smaller">R
                ` +
							value.price +
							`
                <span class="float-right">
                  <i class="fas fa-bed"></i> ` +
							value.bedrooms +
							`
                  <i class="fas fa-bath ml-3"></i> ` +
							value.bathrooms +
							`
                  <i class="fas fa-arrows-alt ml-3"></i> ` +
							value.size +
							`m²
                </span>
              </h3>
              <button id="` +
							value.id +
							`" class="view-details btn btn-block btn-secondary mt-2 select-house">View Details</button>
            </div>
          `
					);
				});

				swiper.update();
			}
		},
		error: function () {
			console.log("Error: Get Filtered Designs");
		},
	});
}

// Home Page - Get Design Details by ID
function getDesignDetails(id) {
	$.ajax({
		url: "server/designs/getDesignDetails.php",
		type: "get",
		data: {
			designId: id,
		},
		success: function (res) {
			if (res !== "No Results" && res !== "Invalid Parameter") {
				res = JSON.parse(res);

				$(".carousel-item").each(function () {
					$(this).remove();
				});

				$(".carousel-indicators-item").each(function () {
					$(this).remove();
				});

				let indicatorCounter = 0;

				if (res.image1 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item active">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image1 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							1 +
							`" src="media/designs/` +
							res.image1 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 1">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="active carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image2 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image2 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							2 +
							`" src="media/designs/` +
							res.image2 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 2">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image3 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image3 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							3 +
							`" src="media/designs/` +
							res.image3 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 3">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image4 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image4 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							4 +
							`" src="media/designs/` +
							res.image4 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 4">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image5 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image5 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							5 +
							`" src="media/designs/` +
							res.image5 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 5">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image6 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image6 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							6 +
							`" src="media/designs/` +
							res.image6 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 6">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image7 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image7 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							7 +
							`" src="media/designs/` +
							res.image7 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 7">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image8 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image8 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							8 +
							`" src="media/designs/` +
							res.image8 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 8">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image9 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image9 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							9 +
							`" src="media/designs/` +
							res.image9 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 9">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image10 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image10 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							10 +
							`" src="media/designs/` +
							res.image10 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 10">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image11 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image11 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							11 +
							`" src="media/designs/` +
							res.image11 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 11">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				if (res.image12 !== "") {
					$(".carousel-inner").append(
						`
					<div class="carousel-item">
					<a href="https://instaplan.co.za/media/designs/` +
							res.image12 +
							`.jpg" target="_blank">
						<img id="designDetailsGalleryImage` +
							12 +
							`" src="media/designs/` +
							res.image12 +
							`.jpg" class="d-block w-100" alt="Design Gallery Image 12">
							</a>
				  	</div>
					`
					);

					$(".carousel-indicators").append(
						`
						<li class="carousel-indicators-item" data-target="#carouselExampleIndicators" data-slide-to="` +
							indicatorCounter +
							`"></li>
					`
					);

					indicatorCounter++;
				}

				// TODO: Set carousel to first slide

				$("#designDetailsTitle").text(res.title);
				$("#designDetailsPrice").text("R" + res.price);
				$("#designDetailsDescription").text(res.description);

				$("#designDetailsSize").text(res.size + "m²");
				$("#designDetailsBedrooms").text(res.bedrooms);
				$("#designDetailsBathrooms").text(res.bathrooms);
				$("#designDetailsFloors").text(res.floors);
				$("#designDetailsGarage").text(res.garage);
				$("#designDetailsKitchen").text(res.kitchen);
				$("#designDetailsLounge").text(res.lounge);
				$("#designDetailsDining").text(res.dining);
				$("#designDetailsPatio").text(res.patio);

				$("#designDetailsIncluding").html(
					"<strong>Including:</strong> " + res.including
				);

				$("#designDetailsBuy").attr(
					"href",
					"payment/checkout.php?did=" + res.id
				);

				// TODO: Buy Now

				$("#viewDetailsModal").modal("show");
			}
		},
		error: function () {
			console.log("Error: Get Design Details");
		},
	});
}

// Admin Dashboard - Populate Active Designs Table
function getDesigns() {
	$("#active-designs-table").empty();

	$.ajax({
		url: "../server/designs/getDesigns.php",
		type: "get",
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.map(function (value, index) {
					$("#active-designs-table").append(
						`
            <tr>
              <th scope="row">` +
							value.title +
							`</th>
              <td>
                ` +
							value.description +
							`
              </td>
              <td>R` +
							value.price +
							`</td>
              <td>
                <button id="` +
							value.id +
							`" class="edit-design btn btn-block btn-outline-dark p-1">Edit</button>
                <button id="` +
							value.id +
							`" class="delete-design btn btn-block btn-outline-dark p-1">Delete</button>
              </td>
            </tr>
          `
					);
				});
			}
		},
		error: function () {
			console.log("Error: Get Active Designs");
		},
	});
}

// Admin Dashboard - Add Design
function addDesign() {
	let title = $("#addDesignTitle").val();
	let description = $("#addDesignDescription").val();
	let including = $("#addDesignIncluding").val();
	let size = $("#addDesignSize").val();
	let bedrooms = $("#addDesignBedrooms").val();
	let bathrooms = $("#addDesignBathrooms").val();
	let floors = $("#addDesignFloors").val();
	let garage = $("#addDesignGarage").val();
	let kitchen = $("#addDesignKitchen").val();
	let lounge = $("#addDesignLounge").val();
	let dining = $("#addDesignDining").val();
	let patio = $("#addDesignPatio").val();
	let width = $("#addDesignWidth").val();
	let depth = $("#addDesignDepth").val();
	let price = $("#addDesignPrice").val();
	let discount = $("#addDesignDiscount").val();
	let featuredImage = $("#addDesignFeaturedImage").text();
	let image1 = $("#addDesignGalleryImage1").text();
	let image2 = $("#addDesignGalleryImage2").text();
	let image3 = $("#addDesignGalleryImage3").text();
	let image4 = $("#addDesignGalleryImage4").text();
	let image5 = $("#addDesignGalleryImage5").text();
	let image6 = $("#addDesignGalleryImage6").text();
	let image7 = $("#addDesignGalleryImage7").text();
	let image8 = $("#addDesignGalleryImage8").text();
	let image9 = $("#addDesignGalleryImage9").text();
	let image10 = $("#addDesignGalleryImage10").text();
	let image11 = $("#addDesignGalleryImage11").text();
	let image12 = $("#addDesignGalleryImage12").text();

	$.ajax({
		url: "../server/designs/addDesign.php",
		type: "post",
		data: {
			title: title,
			description: description,
			including: including,
			size: size,
			bedrooms: bedrooms,
			bathrooms: bathrooms,
			floors: floors,
			garage: garage,
			kitchen: kitchen,
			lounge: lounge,
			dining: dining,
			patio: patio,
			width: width,
			depth: depth,
			price: price,
			discount: discount,
			featuredImage: featuredImage,
			image1: image1,
			image2: image2,
			image3: image3,
			image4: image4,
			image5: image5,
			image6: image6,
			image7: image7,
			image8: image8,
			image9: image9,
			image10: image10,
			image11: image11,
			image12: image12,
		},
		success: function (res) {
			if (res === "Design Added") {
				$("#addDesignTitle").val("");
				$("#addDesignDescription").val("");
				$("#addDesignIncluding").val("");
				$("#addDesignSize").val("");
				$("#addDesignBedrooms").val("");
				$("#addDesignBathrooms").val("");
				$("#addDesignFloors").val("");
				$("#addDesignGarage").val("");
				$("#addDesignKitchen").val("");
				$("#addDesignLounge").val("");
				$("#addDesignDining").val("");
				$("#addDesignPatio").val("");
				$("#addDesignWidth").val("");
				$("#addDesignDepth").val("");
				$("#addDesignPrice").val("");
				$("#addDesignDiscount").val("");
				$("#addDesignFeaturedImage").text("");
				$("#uploadFeaturedImage").val("");
				$("#addDesignGalleryImage1").text("");
				$("#uploadGalleryImage1").val("");
				$("#addDesignGalleryImage2").text("");
				$("#uploadGalleryImage2").val("");
				$("#addDesignGalleryImage3").text("");
				$("#uploadGalleryImage3").val("");
				$("#addDesignGalleryImage4").text("");
				$("#uploadGalleryImage4").val("");
				$("#addDesignGalleryImage5").text("");
				$("#uploadGalleryImage5").val("");
				$("#addDesignGalleryImage6").text("");
				$("#uploadGalleryImage6").val("");
				$("#addDesignGalleryImage7").text("");
				$("#uploadGalleryImage7").val("");
				$("#addDesignGalleryImage8").text("");
				$("#uploadGalleryImage8").val("");
				$("#addDesignGalleryImage9").text("");
				$("#uploadGalleryImage9").val("");
				$("#addDesignGalleryImage10").text("");
				$("#uploadGalleryImage10").val("");
				$("#addDesignGalleryImage11").text("");
				$("#uploadGalleryImage11").val("");
				$("#addDesignGalleryImage12").text("");
				$("#uploadGalleryImage12").val("");

				$("#uploadFeaturedImageMsg").text("Loading...").hide();
				$("#uploadGalleryImage1Msg").text("Loading...").hide();
				$("#uploadGalleryImage2Msg").text("Loading...").hide();
				$("#uploadGalleryImage3Msg").text("Loading...").hide();
				$("#uploadGalleryImage4Msg").text("Loading...").hide();
				$("#uploadGalleryImage5Msg").text("Loading...").hide();
				$("#uploadGalleryImage6Msg").text("Loading...").hide();
				$("#uploadGalleryImage7Msg").text("Loading...").hide();
				$("#uploadGalleryImage8Msg").text("Loading...").hide();
				$("#uploadGalleryImage9Msg").text("Loading...").hide();
				$("#uploadGalleryImage10Msg").text("Loading...").hide();
				$("#uploadGalleryImage11Msg").text("Loading...").hide();
				$("#uploadGalleryImage12Msg").text("Loading...").hide();
			}
			getDesigns();
		},
		error: function () {
			console.log("Error: Add Design");
		},
	});
}

// Admin Dashboard - Upload Images
function uploadImage(caller, target) {
	var fd = new FormData();
	var files = $("#" + caller)[0].files[0];
	fd.append("file", files);

	$.ajax({
		url: "../server/designs/uploadImage.php",
		type: "post",
		data: fd,
		contentType: false,
		processData: false,
		success: function (res) {
			if (res !== "error") {
				$("#" + target).text(res);
				$("#" + caller + "Msg").text("Upload Complete!");
			} else {
				alert("Error Uploading Image");
			}
		},
		error: function (err) {
			console.log(err);
		},
	});
}

// Admin Dashboard - Get Design Details
function getAdminDesignDetails(id) {
	$.ajax({
		url: "../server/designs/getDesignDetails.php",
		type: "get",
		data: {
			designId: id,
		},
		success: function (res) {
			res = JSON.parse(res);

			$("#addDesignTitle").val(res.title);
			$("#addDesignDescription").val(res.description);
			$("#addDesignIncluding").val(res.including);
			$("#addDesignSize").val(res.size);
			$("#addDesignBedrooms").val(res.bedrooms);
			$("#addDesignBathrooms").val(res.bathrooms);
			$("#addDesignFloors").val(res.floors);
			$("#addDesignGarage").val(res.garage);
			$("#addDesignKitchen").val(res.kitchen);
			$("#addDesignLounge").val(res.lounge);
			$("#addDesignDining").val(res.dining);
			$("#addDesignPatio").val(res.patio);
			$("#addDesignWidth").val(res.width);
			$("#addDesignDepth").val(res.depth);
			$("#addDesignPrice").val(res.price);
			$("#addDesignDiscount").val(res.discount);
			$("#addDesignFeaturedImage").text(res.featuredImage);
			$("#addDesignGalleryImage1").text(res.image1);
			$("#addDesignGalleryImage2").text(res.image2);
			$("#addDesignGalleryImage3").text(res.image3);
			$("#addDesignGalleryImage4").text(res.image4);
			$("#addDesignGalleryImage5").text(res.image5);
			$("#addDesignGalleryImage6").text(res.image6);
			$("#addDesignGalleryImage7").text(res.image7);
			$("#addDesignGalleryImage8").text(res.image8);
			$("#addDesignGalleryImage9").text(res.image9);
			$("#addDesignGalleryImage10").text(res.image10);
			$("#addDesignGalleryImage11").text(res.image11);
			$("#addDesignGalleryImage12").text(res.image12);

			$("#uploadFeaturedImageMsg")
				.text(res.featuredImage + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage1Msg")
				.text(res.image1 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage2Msg")
				.text(res.image2 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage3Msg")
				.text(res.image3 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage4Msg")
				.text(res.image4 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage5Msg")
				.text(res.image5 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage6Msg")
				.text(res.image6 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage7Msg")
				.text(res.image7 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage8Msg")
				.text(res.image8 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage9Msg")
				.text(res.image9 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage10Msg")
				.text(res.image10 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage11Msg")
				.text(res.image11 + ".jpg uploaded")
				.show();
			$("#uploadGalleryImage12Msg")
				.text(res.image12 + ".jpg uploaded")
				.show();
		},
		error: function (err) {
			console.log(err);
		},
	});
}

// Admin Dashboard - Update Design
function updateDesign() {
	const id = $("#updateDesignId").val();
	let title = $("#addDesignTitle").val();
	let description = $("#addDesignDescription").val();
	let including = $("#addDesignIncluding").val();
	let size = $("#addDesignSize").val();
	let bedrooms = $("#addDesignBedrooms").val();
	let bathrooms = $("#addDesignBathrooms").val();
	let floors = $("#addDesignFloors").val();
	let garage = $("#addDesignGarage").val();
	let kitchen = $("#addDesignKitchen").val();
	let lounge = $("#addDesignLounge").val();
	let dining = $("#addDesignDining").val();
	let patio = $("#addDesignPatio").val();
	let width = $("#addDesignWidth").val();
	let depth = $("#addDesignDepth").val();
	let price = $("#addDesignPrice").val();
	let discount = $("#addDesignDiscount").val();
	let featuredImage = $("#addDesignFeaturedImage").text();
	let image1 = $("#addDesignGalleryImage1").text();
	let image2 = $("#addDesignGalleryImage2").text();
	let image3 = $("#addDesignGalleryImage3").text();
	let image4 = $("#addDesignGalleryImage4").text();
	let image5 = $("#addDesignGalleryImage5").text();
	let image6 = $("#addDesignGalleryImage6").text();
	let image7 = $("#addDesignGalleryImage7").text();
	let image8 = $("#addDesignGalleryImage8").text();
	let image9 = $("#addDesignGalleryImage9").text();
	let image10 = $("#addDesignGalleryImage10").text();
	let image11 = $("#addDesignGalleryImage11").text();
	let image12 = $("#addDesignGalleryImage12").text();

	$.ajax({
		url: "../server/designs/updateDesign.php",
		type: "post",
		data: {
			designId: id,
			title: title,
			description: description,
			including: including,
			size: size,
			bedrooms: bedrooms,
			bathrooms: bathrooms,
			floors: floors,
			garage: garage,
			kitchen: kitchen,
			lounge: lounge,
			dining: dining,
			patio: patio,
			width: width,
			depth: depth,
			price: price,
			discount: discount,
			featuredImage: featuredImage,
			image1: image1,
			image2: image2,
			image3: image3,
			image4: image4,
			image5: image5,
			image6: image6,
			image7: image7,
			image8: image8,
			image9: image9,
			image10: image10,
			image11: image11,
			image12: image12,
		},
		success: function (res) {
			if (res === "Design Updated") {
				getDesigns();
				alert(res);
			} else {
				alert("Updating Design Failed: one or more fields are empty");
			}
		},
		error: function (err) {
			console.log("Error: Update Design - " + err);
		},
	});
}

// Admin Dashboard - Delete Design
function deleteDesign(id) {
	$.ajax({
		url: "../server/designs/deleteDesign.php",
		type: "post",
		data: {
			designId: id,
		},
		success: function (res) {
			getDesigns();
		},
		error: function (err) {
			console.log(err);
		},
	});
}

// Admin Dashboard - Populate Pricing Fields
function getPricing() {
	$.ajax({
		url: "../server/pricing/getPricing.php",
		type: "get",
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.forEach(function (value) {
					$("#price" + value.size).val(value.price);
				});
			}
		},
		error: function () {
			console.log("Error: Get Pricing");
		},
	});
}

// Admin Dashboard - Update Pricing
function updatePricing() {
	const price300 = $("#price300").val();
	const price600 = $("#price600").val();
	const price900 = $("#price900").val();

	$.ajax({
		url: "../server/pricing/updatePricing.php",
		type: "post",
		data: {
			price300: price300,
			price600: price600,
			price900: price900,
		},
		success: function (res) {
			if (res === "Pricing Updated") {
				alert(res);
			} else {
				alert("Updating Pricing Failed: one or more fields are empty");
			}
		},
		error: function (err) {
			console.log("Error: Update Price - " + err);
		},
	});
}

// Admin Dashboard - Populate Payments History Table
function getPayments() {
	$("#payment-history-table").empty();

	$.ajax({
		url: "../server/payments/getPayments.php",
		type: "get",
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.map(function (value, index) {
					$("#payment-history-table").append(
						`
            <tr>
              <th scope="row">` +
							value.id +
							`</th>
              <td>
                ` +
							value.buyerName +
							` <br>
                ` +
							value.buyerContact +
							` <br>
                ` +
							value.buyerEmail +
							`
              </td>
              <td>` +
							value.item +
							`</td>
              <td>R` +
							value.payment +
							`</td>
              <td>` +
							value.paymentDate +
							`</td>
            </tr>
          `
					);
				});
			}
		},
		error: function () {
			console.log("Error: Get Payment History");
		},
	});
}

// Admin Dashboard - Populate Contact Requests Table
function getContacts() {
	$("#contact-requests-table").empty();

	$.ajax({
		url: "../server/contacts/getContacts.php",
		type: "get",
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.map(function (value, index) {
					$("#contact-requests-table").append(
						`
            <tr>
              <th scope="row">` +
							value.id +
							`</th>
              <td>` +
							value.name +
							`</td>
              <td>` +
							value.email +
							`</td>
              <td>` +
							value.message +
							`</td>
              <td>` +
							value.contactDate +
							`</td>
            </tr>
          `
					);
				});
			}
		},
		error: function () {
			console.log("Error: Get Contact Requests");
		},
	});
}

// Admin Dashboard - Populate Active Users Table
function getUsers() {
	$("#active-users-table").empty();

	$.ajax({
		url: "../server/users/getUsers.php",
		type: "get",
		success: function (res) {
			if (res !== "No Results") {
				res = JSON.parse(res);

				res.map(function (value, index) {
					$("#active-users-table").append(
						`
            <tr>
              <td>` +
							value.username +
							`</td>
              <td>` +
							value.password +
							`</td>
              <td>` +
							value.email +
							`</td>
              <td>
                <button id="` +
							value.id +
							`" class="edit-user btn btn-block btn-outline-dark p-1">Edit</button>
                <button id="` +
							value.id +
							`" class="delete-user btn btn-block btn-outline-dark p-1">Delete</button>
              </td>
            </tr>
          `
					);
				});
			}
		},
		error: function () {
			console.log("Error: Get Active Users");
		},
	});
}

// Admin Dashboard - Add User
function addUser() {
	const username = $("#addUserUsername").val();
	const password = $("#addUserPassword").val();
	const email = $("#addUserEmail").val();

	$.ajax({
		url: "../server/users/addUser.php",
		type: "post",
		data: {
			username: username,
			password: password,
			emailacc: email,
		},
		success: function (res) {
			if (res === "User Added") {
				getUsers();

				$("#addUserUsername").val("");
				$("#addUserPassword").val("");
				$("#addUserEmail").val("");

				alert(res);
			} else {
				alert("Adding User Failed: one or more fields are empty");
			}
		},
		error: function (err) {
			console.log("Error: Add User - " + err);
		},
	});
}

// Admin Dashboard - Get User Details
function getUserDetails(id) {
	$.ajax({
		url: "../server/users/getUserDetails.php",
		type: "get",
		data: {
			userId: id,
		},
		success: function (res) {
			res = JSON.parse(res);

			$("#addUserUsername").val(res.username);
			$("#addUserPassword").val(res.password);
			$("#addUserEmail").val(res.email);
		},
		error: function (err) {
			console.log(err);
		},
	});
}

// Admin Dashboard - Update User
function updateUser() {
	const id = $("#updateUserId").val();
	const username = $("#addUserUsername").val();
	const password = $("#addUserPassword").val();
	const email = $("#addUserEmail").val();

	$.ajax({
		url: "../server/users/updateUser.php",
		type: "post",
		data: {
			userId: id,
			username: username,
			password: password,
			emailacc: email,
		},
		success: function (res) {
			if (res === "User Updated") {
				getUsers();
				alert(res);
			} else {
				alert("Updating User Failed: one or more fields are empty");
			}
		},
		error: function (err) {
			console.log("Error: Update User - " + err);
		},
	});
}

// Admin Dashboard - Delete User
function deleteUser(id) {
	$.ajax({
		url: "../server/users/deleteUser.php",
		type: "post",
		data: {
			userId: id,
		},
		success: function (res) {
			getUsers();
		},
		error: function (err) {
			console.log(err);
		},
	});
}
