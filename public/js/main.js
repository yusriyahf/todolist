const homeURL = "http://127.0.0.1:8000/";

function loadMoreData(paginate) {
    $.ajax({
        url: "?limit=" + paginate,
        type: "get",
        datatype: "html",
        beforeSend: function () {
            $(".loading").show();
        },
    })
        .done(function (data) {
            if (data.length == 0) {
                $(".loading").html("No more posts.");
                return;
            } else {
                $(".loading").hide();
                $("#post").append(data);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert("Something went wrong.");
        });
}

var myfunc = function () {
    document.getElementById("test").style.backgroundColor = "red";
};

document.getElementById("btn0").click();

function formatDate(datetime) {
    if (datetime.getDate() < 10) {
        var date =
            "0" +
            datetime.getDate() +
            "/" +
            datetime.getMonth() +
            "/" +
            datetime.getFullYear();
        console.log("date < 10");
    }
    if (datetime.getMonth() < 10) {
        var date =
            datetime.getDate() +
            "/0" +
            datetime.getMonth() +
            "/" +
            datetime.getFullYear();
        console.log("month < 10");
    }
    if (datetime.getDate() >= 10 && datetime.getMonth() >= 10) {
        var date =
            datetime.getDate() +
            "/" +
            datetime.getMonth() +
            "/" +
            datetime.getFullYear();
    }

    return date;
}

// search ajax
// $("#searchInput").keydown(function (e) {
//     if (e.keyCode == 13) {
//         var searchVal = $(this).val();
//         search(searchVal);
//     }
// });
// function search(val) {
//     if (val === null || val === "") {
//         return window.location.reload();
//     }

//     $.ajax({
//         url: homeURL + `search/${val}`,
//         error: (xhr, status, err) => {
//             var TaskList = $("#task-list");
//             TaskList.html(
//                 `<li id="search-not-found"><h4>Didn't found any match!</h4></li>`
//             );

//             console.log(err);
//         },
//         success: (res, stats, xhr) => {
//             var data = JSON.parse(res);
//             console.log(data);

//             if (data === null) {
//                 var TaskList = $("#task-list");
//                 TaskList.html(
//                     `<li id="search-not-found"><h4>Didn't found any match ;-;</h4></li>`
//                 );
//                 return;
//             }

//             var tasks = data;

//             var TaskList = $("#task-list");
//             TaskList.html(``);

//             for (let i = 0; i < tasks.length; i++) {
//                 var id = tasks[i].id;
//                 var title = tasks[i].title;
//                 var description = tasks[i].description;
//                 var category = tasks[i].category;
//                 var datetime = new Date(tasks[i].end_date);
//                 var date = formatDate(datetime);

//                 if (category === "Game") {
//                     TaskList.append(`
// 					<div class="col-md-4 isotope-item ${category}">
// 						<div class="card list-item (${title})">
// 							<div class="card-body">
// 								<div class="menu">
// 									<div class="abc">
// 										<button class="rounded-circle">
// 											<img src="icon/console.png" alt="">
// 										</button>
// 									</div>
// 									<h5 class="card-title text-lowercase">${title}</h5>
// 									<p class="card-text text-lowercase">${description}</p>
// 									<a href="#" class="btn btn-dark"><i class="far fa-clock"></i> ${date}
// 									</a>
// 									<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="icon/done black.png" alt=""></button>
// 									<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete" (${tasks[i]}})">
// 										<img src="icon/bin black.png" alt="">
// 									</button>
// 								</div>
// 							</div>
// 						</div>
// 					</div>
// 					`);
//                 }
//                 if (category === "School") {
//                     TaskList.append(`
// 					<div class="col-md-4 isotope-item ${category}">
// 						<div class="card list-item (${title})">
// 							<div class="card-body">
// 								<div class="menu">
// 									<div class="abc">
// 										<button class="rounded-circle">
// 											<img src="icon/school.png" alt="">
// 										</button>
// 									</div>
// 									<h5 class="card-title text-lowercase">${title}</h5>
// 									<p class="card-text text-lowercase">${description}</p>
// 									<a href="#" class="btn btn-dark"><i class="far fa-clock"></i> ${date}
// 									</a>
// 									<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="icon/done black.png" alt=""></button>
// 									<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete" (${tasks[i]}})">
// 										<img src="icon/bin black.png" alt="">
// 									</button>
// 								</div>
// 							</div>
// 						</div>
// 					</div>
// 					`);
//                 }
//                 if (category === "Birthday") {
//                     TaskList.append(`
// 						<div class="col-md-4 isotope-item ${category}">
// 							<div class="card list-item (${title})">
// 								<div class="card-body">
// 									<div class="menu">
// 										<div class="abc">
// 											<button class="rounded-circle">
// 												<img style="margin-right: -6px;" src="icon/birthday.png" alt="">
// 											</button>
// 										</div>
// 										<h5 class="card-title text-lowercase">${title}</h5>
// 										<p class="card-text text-lowercase">${description}</p>
// 										<a href="#" class="btn btn-dark"><i class="far fa-clock"></i> ${date}
// 										</a>
// 										<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="icon/done black.png" alt=""></button>
// 										<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete" (${tasks[i]}})">
// 											<img src="icon/bin black.png" alt="">
// 										</button>
// 									</div>
// 								</div>
// 							</div>
// 						</div>
// 						`);
//                 }
//                 if (category === "Meeting") {
//                     TaskList.append(`
// 							<div class="col-md-4 isotope-item ${category}">
// 								<div class="card list-item (${title})">
// 									<div class="card-body">
// 										<div class="menu">
// 											<div class="abc">
// 												<button class="rounded-circle">
// 													<img src="icon/meeting.png">
// 												</button>
// 											</div>
// 											<h5 class="card-title text-lowercase">${title}</h5>
// 											<p class="card-text text-lowercase">${description}</p>
// 											<a href="#" class="btn btn-dark"><i class="far fa-clock"></i> ${date}
// 											</a>
// 											<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="icon/done black.png" alt=""></button>
// 											<button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete" (${tasks[i]}})">
// 												<img src="icon/bin black.png" alt="">
// 											</button>
// 										</div>
// 									</div>
// 								</div>
// 							</div>
// 							`);
//                 }
//             }
//         },
//     });
// }
