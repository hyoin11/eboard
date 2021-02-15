$(function(){
    // 로그인 로그아웃 버튼
    $('#logBtn').on('click', function(){
        if($('#logBtn').val() == '로그아웃'){
            // console.log('로그아웃');
            if(confirm('로그아웃하시겠습니까?')){
                location.href='./logout.php';
            }
        }else{
            // console.log('로그인');
            location.href='./login.php';
        }
    });

    // 게시글 삭제
    $('#deleteBtn').on('click', function(){
        // console.log($("#b_idx").val());
        if(confirm('삭제하시겠습니까?')){
            location.href="./delete.php?b_idx=" + $("#b_idx").val();
        }
    });

    // 검색
    $('#searchBtn').on('click', function(){
        // alert('검색');
        if($('#searchBox').val() == '' || $('#searchBox').val() == null){
            location.href='./board.php';
        }else{
            $.ajax({
                url: "search.php",
                type: "post",
                data: {
                    search: $('#searchBox').val()
                }
            }).done(function(data) {
                // console.log(data);
                $('tbody').children().remove();
                $('tbody').append(data);
                $('#paging').children().remove();
            });
        }
    });

    // 아이디 찾기
    $('#findIdBtn').on('click', function(){
        // alert('아이디검색');
        let userph = $("#findPh").val();
        if(userph == ''){
            alert('휴대폰번호를 입력하세요.');
            $('#findPh').focus();
            return
        }
        let expPhText = /^\d{3}-\d{3,4}-\d{4}$/;
        if(expPhText.test(userph) == false){
            alert('휴대폰번호 형식을 확인하세요.');
            $("#findPh").focus();
            return
        }
        $.ajax({
            url: "findId.php",
            type: "post",
            data: {
                userph: $('#findPh').val()
            }
        }).done(function(data) {
            // console.log(data);
            if(data == '없음'){
                $('#idFind_wrap').children('div:nth-child(3)').css('display','block').children().remove();
                $('#idFind_wrap').children('div:nth-child(3)').append('<p style="margin-top: 17px; text-align: center; line-height: 20px; padding-top: 0;">가입정보가 없습니다.</p><p><a href="./regist.php">회원가입</a></p>');
            }else{
                $('#idFind_wrap').children('div:nth-child(3)').css('display','block').children().remove();
                $('#idFind_wrap').children('div:nth-child(3)').append('<p>가입하신 아이디는 <span id="findUserId">'+data+'</span> 입니다.</p><p><a href="./login.php">로그인하러 가기</a></p><p><a href="./passFind.html">비밀번호 찾기</a></p>');
            }
        });
    });

    // 비밀번호 찾기
    $('#findPassBtn').on('click', function(){
        // alert('비밀번호검색');
        let userid = $("#passFindId").val();
        if(userid == ''){
            alert('아이디를 입력하세요.');
            $('#passFindId').focus();
            return false;
        }
        if(userid.length < 4 || userid.length > 20){
            alert('아이디를 4자 이상 20자 이하로 입력하세요.');
            $('#passFindId').focus();
            return false;
        }
        let regExpId = /^[0-9a-z]+$/;
        if(regExpId.test(userid) == false){
            alert('아이디 형식을 확인하세요.');
            $('#passFindId').focus();
            return false;
        }
        let userph = $("#passFindPh").val();
        if(userph == ''){
            alert('휴대폰번호를 입력하세요.');
            $('#passFindPh').focus();
            return
        }
        let expPhText = /^\d{3}-\d{3,4}-\d{4}$/;
        if(expPhText.test(userph) == false){
            alert('휴대폰번호 형식을 확인하세요.');
            $("#passFindPh").focus();
            return
        }
        $.ajax({
            url: "findPass.php",
            type: "post",
            data: {
                userid: userid,
                userph: userph
            }
        }).done(function(data) {
            console.log(data);
            if(data == '없음'){
                $('#passFind_wrap').children('div:nth-child(4)').css('display','block');
            }else{
                
                let form = document.createElement('form'); // 폼객체 생성
                let objs;
                objs = document.createElement('input'); // 값이 들어있는 녀석의 형식
                objs.setAttribute('type', 'text'); // 값이 들어있는 녀석의 type
                objs.setAttribute('name', 'passChangeId'); // 객체이름
                objs.setAttribute('value', $('#passFindId').val()); //객체값
                form.appendChild(objs);
                let objs2;
                objs2 = document.createElement('input');
                objs2.setAttribute('type', 'text'); // 값이 들어있는 녀석의 type
                objs2.setAttribute('name', 'passChangePh'); // 객체이름
                objs2.setAttribute('value', $('#passFindPh').val()); //객체값
                form.appendChild(objs2);
                form.setAttribute('method', 'post'); //get,post 가능
                form.setAttribute('action', "./passChange.php"); //보내는 url
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});

function idCheck() {
    let userid = $("#userid").val();
    if(userid == ''){
        alert('아이디를 입력하세요.');
        $('#userid').focus();
        return false;
    }
    if(userid.length < 4 || userid.length > 20){
        alert('아이디를 4자 이상 20자 이하로 입력하세요.');
        $('#userid').focus();
        return false;
    }
    let regExpId = /^[0-9a-z]+$/;
    if(regExpId.test(userid) == false){
        alert('아이디 형식을 확인하세요.');
        $('#userid').focus();
        return false;
    }

    $.ajax({
        url: "idCheck.php",
        type: "post",
        data: {
            userid: $('#userid').val()
        }
    }).done(function(data) {
        console.log(data);
        if(data == 'false'){
            $("#idCheckConfirm").text("사용할 수 없는 아이디입니다.").css('color', 'red').prev('input').css('left', '-70px');
            // console.log('있음');
            return false;
        }else if(data == 'true'){
            $("#idCheckConfirm").text("사용가능한 아이디입니다!").css('color', '#08A600').prev('input').css('left', '-82px');
            $("#isIdCheck").val('true');
            // console.log('없음');
            return true;
        }
    });
}

function phCheck() {
    let userph = $("#userph").val();
    if(userph == ''){
        alert('휴대폰번호를 입력하세요.');
        $('#userph').focus();
        return false;
    }
    let expPhText = /^\d{3}-\d{3,4}-\d{4}$/;
    if(expPhText.test(userph) == false){
        alert('휴대폰번호 형식을 확인하세요.');
        $("#userph").focus();
        return false;
    }

    $.ajax({
        url: "phCheck.php",
        type: "post",
        data: {
            userph: $('#userph').val()
        }
    }).done(function(data) {
        console.log(data);
        if(data == 'false'){
            $("#phCheckConfirm").text("사용할 수 없는 휴대폰번호입니다.").css('color', 'red').prev('input').css('left', '-41px');
            // console.log('있음');
            return false;
        }else if(data == 'true'){
            $("#phCheckConfirm").text("사용가능한 휴대폰번호입니다!").css('color', '#08A600').prev('input').css('left', '-53px');
            $("#isPhCheck").val('true');
            // console.log('없음');
            return true;
        }
    });
}

function sendit(){
    // alert('sendit() 함수 호출');
    // return false;
    let frm = document.regform;

    if(frm.userid.value == ''){
        alert('아이디를 입력하세요.');
        frm.userid.focus();
        return false;
    }
    if(frm.userid.value.length < 4 || frm.userid.value.length > 20){
        alert('아이디를 4자 이상 20자 이하로 입력하세요.');
        frm.userid.focus();
        return false;
    }
    let regExpId = /^[0-9a-z]+$/;
    if(regExpId.test(frm.userid.value) == false){
        alert('아이디 형식을 확인하세요.');
        frm.userid.focus();
        return false;
    }
    if(frm.isIdCheck.value == 'false'){
        alert('아이디 중복확인을 해주세요.');
        frm.userid.focus();
        return false;
    }

    if(frm.userpw.value == ''){
        alert('비밀번호를 입력하세요.');
        frm.userpw.focus();
        return false;
    }
    if(frm.userpw.value.length < 4 || frm.userpw.value.length > 20){
        alert('비밀번호를 4자 이상 20자 이하로 입력하세요.');
        frm.userpw.focus();
        return false;
    }
    let expPwText = /^.*(?=^.{4,20})(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/;
    if(expPwText.test(frm.userpw.value) == false){
        alert('비밀번호 형식을 확인하세요.');
        frm.userpw.focus();
        return false;
    }
    if(frm.userpw.value != frm.userpw_re.value){
        alert('비밀번호를 확인하세요.');
        frm.userpw.focus();
        return false;
    }

    let expPhText = /^\d{3}-\d{3,4}-\d{4}$/;
    if(expPhText.test(frm.userph.value) == false){
        alert('휴대폰번호 형식을 확인하세요.');
        frm.userph.focus();
        return false;
    }
    if(frm.isPhCheck.value == 'false'){
        alert('휴대폰번호 중복확인을 해주세요.');
        frm.userph.focus();
        return false;
    }
}

function checkPass(){
    // alert('checkPass() 함수 호출');
    // return false;
    
    if($('#changePass').val() == ''){
        alert('비밀번호를 입력하세요.');
        $('#changePass').focus();
        return false;
    }
    if($('#changePass').val().length < 4 || $('#changePass').val().length > 20){
        alert('비밀번호를 4자 이상 20자 이하로 입력하세요.');
        $('#changePass').focus();
        return false;
    }
    let expPwText = /^.*(?=^.{4,20})(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/;
    if(expPwText.test($('#changePass').val()) == false){
        alert('비밀번호 형식을 확인하세요.');
        $('#changePass').focus();
        return false;
    }
    if($('#changePass').val() != $('#changePass_re').val()){
        alert('비밀번호를 확인하세요.');
        $('#changePass').focus();
        return false;
    }
}