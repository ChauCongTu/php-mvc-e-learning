document.addEventListener("DOMContentLoaded", function (event) {
  var editorElements = document.querySelectorAll('.editor');

  for (var i = 0; i < editorElements.length; ++i) {
    ClassicEditor
      .create(editorElements[i], {
        // Cấu hình cho trình soạn thảo CKEditor
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList'],
      })
      .catch(error => {
        console.error(error);
      });
  }
});


$('.course-list').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  dots: false,
  prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
  ]
});

$('.slick-pane').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  dots: false,
  prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  }
  ]
});


$(document).ready(function () {
  var s = $(".nav-bar-home");
  var pos = s.position();
  $(window).scroll(function () {
    var windowpos = $(window).scrollTop();
    if (windowpos >= pos.top) {
      s.addClass("fixed-top");
      s.addClass("shadow-sm");
    } else {
      s.removeClass("fixed-top");
      s.removeClass("shadow-sm");
    }
  });
});

var h = null; // Giờ
var m = null; // Phút
var s = null; // Giây
function start($minute) {
  if (h === null) {
    s = 0;
    m = $minute;
    h = 0;
  }
  if (s === -1) {
    m -= 1;
    s = 59;
  }
  if (m === -1) {
    h -= 1;
    m = 59;
  }
  if (h == -1) {
    clearTimeout(timeout);
    alert('Hết giờ');
    return false;
  }

  document.getElementById('m').innerText = m.toString().padStart(2, "0");
  document.getElementById('s').innerText = s.toString().padStart(2, "0");

  /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
  timeout = setTimeout(function () {
    s--;
    start();
  }, 1000);
}
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}