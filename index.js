document.addEventListener("DOMContentLoaded", function(){
    $("#check_id").click(function(e){
        var uid = $("#userid").val();
        if (!/^[A-Za-z0-9]*$/.test(uid)){
            alert("아이디는 영어와 숫자만 입력해주세요.");
            e.preventDefault();
            return false;
        }
        $.ajax({url:'check_id.php', data:{userid:uid}, method:"POST",
            success : function(data){
                if(data > 0) alert("사용중인 아이디입니다.");
                else {
                    alert("사용 가능한 아이디입니다.");
                    $("#idok").val(1);
                }
            }
        })
    })
    $("#userid").change(function(){
        $("#idok").val(0);
    })
    document.querySelector('#join_submit').addEventListener('click', function(e){
        const name = document.querySelector("#name").value;
        const userpw = document.querySelector("#userpw").value;
        if(name === ''){
            alert("이름을 입력해주세요.");
            e.preventDefault();
            return false;
        }else if (!/^[가-힣]+$/.test(name)){
            alert("이름은 한글만 입력해주세요.")
            e.preventDefault();
            return false;
        } else if (userpw === '') {
            alert("비밀번호를 입력해주세요.");
            e.preventDefault();
            return false;
        }else if (!/^[A-Za-z0-9]*$/.test(userpw)){
            alert("비밀번호는 영문과 숫자만 입력해주세요.")
            e.preventDefault();
            return false;
        }
    })
    function ck(f){
        if(f.idok.value != 1){
            alert("중복확인을 먼저 해주세요.");
            return false;
        }
    }
})