$(document).ready(function () {
  $(".reviews-form").submit(function (event) {
    event.preventDefault();

    var formData = $(this).serialize();
    var index = $(".rating.selected").data("index");

    // Thêm giá trị selectedIndex vào formData
    formData += "&index=" + index;
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "./ajax/comment.php",
      data: {
        formData,
      },
      success: function (data) {
        console.log(data);
        alert("ADD comment successfully");
        if (data.trim() == "Success: Comment added successfully.") {
          console.log("Lets update");
          renderComment(10, 0);
        }
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  });
  // Gọi hàm cập nhật comment khi trang được tải
  // Bắt sự kiện khi người dùng chọn một rating
  $(".rating").click(function () {
    $(".rating").removeClass("selected");
    $(this).addClass("selected");
  });
  //sủ sụng ajax để update cmt
});
let limit = {
  take: 5,
  skip: 0,
};
const renderComment = (take, skip) => {
  const productID = parseInt($("#productID").val() ?? "0");
  $(() => {
    $.get(
      "./ajax/comment.php",
      {
        productID: productID,
        take: take,
        skip: skip,
      },
      (data) => {
        try {
          const res = JSON.parse(data);
          $("#cmt").html(`Comment(${res.total_cmt})`);
          if (res.status === "failed") {
            $("#comments-container").html(
              `<div>
                <strong>This product has no comments yet</strong>
            </div>`
            );
            return;
          }
          let html = res.data.map((item) => {
            let star = ``;
            for (let i = 1; i <= 5; i++) {
              let color = "color:#ccc;";
              if (i <= item.StarRate) color = "color:#ffcc00;";
              star += `   
                <li class="fix_rating" style="cursor: pointer;font-size: 20px;${color}">
                    &#9733;
                </li>`;
            }
            return `
                <div class="review-item-submitted">
                    <strong>${item.Name}</strong>
                    <em>${item.CreatedDate}</em>
                    <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true">
                        <ul style="list-style: none; display: inline-flex;">
                            ${star}
                        </ul>
                    </div>
                </div>
                <div class="review-item-content">
                    <p>${item.Details}</p>
                </div>
                `;
          });
          $("#comments-container").html(html.join(" "));
          const btnBack = `<button style="display: flex; justify-items: center; justify-content: space-between; 
         border:none; border-radius: 10px; padding:5px; background-color :#edeff1; color: #333
         ;float:left;" onclick="backCmt()" 
         onmouseover="this.style.backgroundColor='#cc3304'; this.style.color='#fff'"
         onmouseout="this.style.backgroundColor='#edeff1'; this.style.color='#333'">
            <span style="margin-right:5px;"><i class="fa-solid fa-arrow-left"></i></span>
             <span>PREVIOUS</span>
         </button>`;
          const btnNext = `<button onclick="nextCmt()"
          onmouseover="this.style.backgroundColor='#cc3304'; this.style.color='#fff'"
         onmouseout="this.style.backgroundColor='#edeff1'; this.style.color='#333'"
         style="background-color :#edeff1;color: #333;display: flex; justify-items: center; justify-content: space-between;border:none;border-radius: 10px; padding:5px;float:right;">
         <span  style="margin-right:5px;">NEXT</span>
         <span><i class="fa-solid fa-arrow-right"></i></span>
      </button>`;
          let pagination = ``;
          if (limit.skip === 0) {
            // pagination = btnNext;
          } else {
            if (res.data.length < 5) {
              pagination = btnBack;
            } else {
              pagination = btnBack + btnNext;
            }
          }
          $("#pagination").html(pagination);
        } catch (error) {
          $("#cmt").html(`Comment(0)`);
          $("#comments-container").html(
            `<div>
                <strong>This product has no comments yet</strong>
            </div>`
          );
        }
      }
    );
  });
};
renderComment(limit.take, limit.skip);
const nextCmt = () => {
  limit = {
    take: 5,
    skip: limit.skip + 5,
  };
  renderComment(limit.take, limit.skip);
};
const backCmt = () => {
  limit = {
    take: 5,
    skip: limit.skip - 5,
  };
  renderComment(limit.take, limit.skip);
};
