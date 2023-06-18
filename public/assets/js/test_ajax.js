$(document).ready(function () {
    var question = 1;
    var total_question = 40;
    var numb_question = 0;
    var answer = 0;
    var result = [];
    for (let i = 1; i <= total_question; i++) {
      $('#' + i + '').click(function () {
        numb_question = parseInt($('.number_question').text(), 10);
        answer = $('input[name="answer"]:checked').val();
        question = i;
        $.ajax({
          url: '/test/save_anwser',
          type: 'post',
          data: {
            numb_question: numb_question,
            answer: answer
          },
          success: function (data) {
            result[numb_question] = data.answer[numb_question];
            console.log('saved: ' + numb_question + ': ' + result[numb_question]);
          }
        });
        $.ajax({
          url: '/test/process',
          type: 'post',
          data: {
            question: question
          },
          dataType: 'json',
          success: function (data) {
            if (result[data.numb] == 1) {
              $('#questionInfo').html(
                '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
                '<p class="fw-bold">' + data.content + '</p>' +
                '<div>' +
                '    <form action="">' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="a" value="1" checked>' +
                '            <label class="form-check-label " for="a">' +
                '               A. ' + data.answer_1 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
                '            <label class="form-check-label " for="b">' +
                '                B. ' + data.answer_2 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
                '            <label class="form-check-label " for="c">' +
                '                C. ' + data.answer_3 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
                '            <label class="form-check-label " for="d">' +
                '                 D. ' + data.answer_4 +
                '           </label>' +
                '       </div>' +
                '   </form>' +
                '</div>'
              )
  
            } else if (result[data.numb] == 2) {
              $('#questionInfo').html(
                '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
                '<p class="fw-bold">' + data.content + '</p>' +
                '<div>' +
                '    <form action="">' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
                '            <label class="form-check-label " for="a">' +
                '               A. ' + data.answer_1 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="b" value="2" checked>' +
                '            <label class="form-check-label " for="b">' +
                '                B. ' + data.answer_2 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
                '            <label class="form-check-label " for="c">' +
                '                C. ' + data.answer_3 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
                '            <label class="form-check-label " for="d">' +
                '                 D. ' + data.answer_4 +
                '           </label>' +
                '       </div>' +
                '   </form>' +
                '</div>'
              )
            } else if (result[data.numb] == 3) {
              $('#questionInfo').html(
                '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
                '<p class="fw-bold">' + data.content + '</p>' +
                '<div>' +
                '    <form action="">' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
                '            <label class="form-check-label " for="a">' +
                '               A. ' + data.answer_1 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
                '            <label class="form-check-label " for="b">' +
                '                B. ' + data.answer_2 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="c" value="3" checked>' +
                '            <label class="form-check-label " for="c">' +
                '                C. ' + data.answer_3 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
                '            <label class="form-check-label " for="d">' +
                '                 D. ' + data.answer_4 +
                '           </label>' +
                '       </div>' +
                '   </form>' +
                '</div>'
              )
            } else if (result[data.numb] == 4) {
              $('#questionInfo').html(
                '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
                '<p class="fw-bold">' + data.content + '</p>' +
                '<div>' +
                '    <form action="">' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
                '            <label class="form-check-label " for="a">' +
                '               A. ' + data.answer_1 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
                '            <label class="form-check-label " for="b">' +
                '                B. ' + data.answer_2 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
                '            <label class="form-check-label " for="c">' +
                '                C. ' + data.answer_3 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="d" value="4" checked>' +
                '            <label class="form-check-label " for="d">' +
                '                 D. ' + data.answer_4 +
                '           </label>' +
                '       </div>' +
                '   </form>' +
                '</div>'
              )
            } else {
              $('#questionInfo').html(
                '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>: </div>' +
                '<p class="fw-bold">' + data.content + '</p>' +
                '<div>' +
                '    <form action="">' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
                '            <label class="form-check-label " for="a">' +
                '               A. ' + data.answer_1 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
                '            <label class="form-check-label " for="b">' +
                '                B. ' + data.answer_2 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
                '            <label class="form-check-label " for="c">' +
                '                C. ' + data.answer_3 +
                '            </label>' +
                '        </div>' +
                '        <div class="mt-2 border p-3 rounded">' +
                '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
                '            <label class="form-check-label " for="d">' +
                '                 D. ' + data.answer_4 +
                '           </label>' +
                '       </div>' +
                '   </form>' +
                '</div>'
              )
            };
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' - ' + errorThrown);
          }
        });
      });
    }
  
    $('#nextBtn').click(function () {
      numb_question = parseInt($('.number_question').text(), 10);
      answer = $('input[name="answer"]:checked').val();
      question++;
      $.ajax({
        url: '/test/save_anwser',
        type: 'post',
        data: {
          numb_question: numb_question,
          answer: answer
        },
        success: function (data) {
          result[numb_question] = data.answer[numb_question];
          console.log('saved: ' + numb_question + ': ' + result[numb_question]);
        }
      });
      $.ajax({
        url: '/test/process',
        type: 'post',
        data: {
          question: question
        },
        dataType: 'json',
        success: function (data) {
          if (result[data.numb] == 1) {
            $('#questionInfo').html(
              '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
              '<p class="fw-bold">' + data.content + '</p>' +
              '<div>' +
              '    <form action="">' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="a" value="1" checked>' +
              '            <label class="form-check-label " for="a">' +
              '               A. ' + data.answer_1 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
              '            <label class="form-check-label " for="b">' +
              '                B. ' + data.answer_2 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
              '            <label class="form-check-label " for="c">' +
              '                C. ' + data.answer_3 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
              '            <label class="form-check-label " for="d">' +
              '                 D. ' + data.answer_4 +
              '           </label>' +
              '       </div>' +
              '   </form>' +
              '</div>'
            )
  
          } else if (result[data.numb] == 2) {
            $('#questionInfo').html(
              '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
              '<p class="fw-bold">' + data.content + '</p>' +
              '<div>' +
              '    <form action="">' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
              '            <label class="form-check-label " for="a">' +
              '               A. ' + data.answer_1 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="b" value="2" checked>' +
              '            <label class="form-check-label " for="b">' +
              '                B. ' + data.answer_2 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
              '            <label class="form-check-label " for="c">' +
              '                C. ' + data.answer_3 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
              '            <label class="form-check-label " for="d">' +
              '                 D. ' + data.answer_4 +
              '           </label>' +
              '       </div>' +
              '   </form>' +
              '</div>'
            )
          } else if (result[data.numb] == 3) {
            $('#questionInfo').html(
              '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
              '<p class="fw-bold">' + data.content + '</p>' +
              '<div>' +
              '    <form action="">' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
              '            <label class="form-check-label " for="a">' +
              '               A. ' + data.answer_1 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
              '            <label class="form-check-label " for="b">' +
              '                B. ' + data.answer_2 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="c" value="3" checked>' +
              '            <label class="form-check-label " for="c">' +
              '                C. ' + data.answer_3 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
              '            <label class="form-check-label " for="d">' +
              '                 D. ' + data.answer_4 +
              '           </label>' +
              '       </div>' +
              '   </form>' +
              '</div>'
            )
          } else if (result[data.numb] == 4) {
            $('#questionInfo').html(
              '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
              '<p class="fw-bold">' + data.content + '</p>' +
              '<div>' +
              '    <form action="">' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
              '            <label class="form-check-label " for="a">' +
              '               A. ' + data.answer_1 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
              '            <label class="form-check-label " for="b">' +
              '                B. ' + data.answer_2 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
              '            <label class="form-check-label" for="c">' +
              '                C. ' + data.answer_3 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="d" value="4" checked>' +
              '            <label class="form-check-label" for="d">' +
              '                 D. ' + data.answer_4 +
              '           </label>' +
              '       </div>' +
              '   </form>' +
              '</div>'
            )
          } else {
            $('#questionInfo').html(
              '<div class="h3">Câu <span class="number_question">' + data.numb + '</span>:</div>' +
              '<p class="fw-bold">' + data.content + '</p>' +
              '<div>' +
              '    <form action="">' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
              '            <label class="form-check-label" for="a">' +
              '               A. ' + data.answer_1 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
              '            <label class="form-check-label" for="b">' +
              '                B. ' + data.answer_2 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
              '            <label class="form-check-label" for="c">' +
              '                C. ' + data.answer_3 +
              '            </label>' +
              '        </div>' +
              '        <div class="mt-2 border p-3 rounded">' +
              '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
              '            <label class="form-check-label" for="d">' +
              '                 D. ' + data.answer_4 +
              '           </label>' +
              '       </div>' +
              '   </form>' +
              '</div>'
            )
          };
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('Error: ' + textStatus + ' - ' + errorThrown);
        }
      });
    });
  });