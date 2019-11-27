function parseUsers()
{
    let candidates = $(document).find('#candidatesInput').val();
    let total_count = 0;
    let list = [];

    $.post( "parse.php", {
        'candidates': candidates
    }, function(response) {
        response = JSON.parse(response);

        if(parseInt(response.total) <= 8) {
            alert('Недостаточное количество участников! Проверьте вводимые данные');
        } else {
            total_count = response.total;
            list = response.list;

            $(document).find('#firstPart').hide();

            $(document).find('#totalCount').html(total_count);
            $(document).find('#list').val(JSON.stringify(list));
            $(document).find('#secondPart').show();
        }
    });
}

function findRandomUser()
{
    let list = JSON.parse($(document).find('#list').val());
    let max = list.length;

    let oldVal = $(document).find('#winners').val();
    oldVal = oldVal.length === 0 ? [] : JSON.parse(oldVal);

    let finished = false;
    let randomNumber = null;

    while(!finished) {
        finished = true;

        randomNumber = parseInt(Math.random() * max);
        for(var i = 0; i < oldVal.length; i++) {
            if(parseInt(oldVal[i].id) === parseInt(randomNumber)) {
                finished = false;
            }
        }
    }

    $(document).find('#winnerBigImage').attr('src', 'img/loading.gif');
    $(document).find('#bigWinnerBlock').css('display', 'none');
    $(document).find('#waiterBlock').css('display', 'block');
    $(document).find('#searchButton').attr('disabled', 'disabled');

    $.post( "instagram.php?account=" + list[randomNumber], function(response) {
        response = JSON.parse(response);

        if(response.picture === null || response.full_name === null) {
            alert('Учетная запись победителя не найдена в Инстаграме. Повторите попытку');
        } else {
            $(document).find('#winners').val(JSON.stringify(oldVal.concat([{
                'id': randomNumber,
                'picture': response.picture,
                'full_name': response.full_name,
                'username': list[randomNumber]
            }])));
        }

        updateWinners();
    });
}

function updateWinners()
{
    let winners = $(document).find('#winners').val();
    winners = winners.length ? JSON.parse(winners) : [];

    if(!winners.length) {
        $(document).find('#bigWinnerBlock').css('display', 'none');
        $(document).find('#waiterBlock').css('display', 'none');
    } else {
        if(winners.length === 8) {
            $(document).find('#searchButton').hide();
        } else {
            $(document).find('#searchButton').removeAttr('disabled');
        }

        for(var i = 0; i < 8; i++) {
            if(typeof(winners[i]) !== 'undefined') {
                $(document).find('#winnerSmallImage_' + i).attr('src', winners[i].picture);
                $(document).find('#winnerSmallLink_' + i).attr('href', 'https://instagram.com/' + winners[i].username);

                if(i === (winners.length - 1)) {
                    $(document).find('#winnerBigImage').attr('src', winners[i].picture);
                    $(document).find('#winnerBigName').html(winners[i].full_name);
                    $(document).find('#winnerBigLink').html('https://instagram.com/' + winners[i].username);
                    $(document).find('#winnerBigLink').attr('href', 'https://instagram.com/' + winners[i].username);

                    $(document).find('#bigWinnerBlock').css('display', 'block');
                    $(document).find('#waiterBlock').css('display', 'none');
                }
            }
        }
    }
}

