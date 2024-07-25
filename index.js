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
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const userid = document.getElementById('userid').value.trim();
        const userpw = document.getElementById('userpw').value.trim();
        
        if (userid === "" || userpw === "") {
            alert("아이디와 비밀번호를 입력해주세요.");
            return;
        }
        
        document.getElementById('captcha-modal').style.display = 'block';
        
        const bgImg = document.querySelector('.captcha-bg');
        const pieceImg = document.getElementById('captcha-piece');
        const slider = document.getElementById('slider');
        
        const bgWidth = bgImg.clientWidth;
        const pieceWidth = pieceImg.clientWidth;
        
        const maxOffset = bgWidth - pieceWidth;
        const pieceLeft = Math.floor(Math.random() * maxOffset);
        
        pieceImg.style.left = pieceLeft + 'px';
        
        slider.addEventListener('input', function() {
            const sliderValue = this.value;
            pieceImg.style.left = (pieceLeft + (maxOffset * sliderValue / 100)) + 'px';
        });
        
        document.getElementById('verify-button').addEventListener('click', function() {
            const currentLeft = parseInt(pieceImg.style.left, 10);
            if (Math.abs(currentLeft - pieceLeft) < 10) {
                document.getElementById('captcha-modal').style.display = 'none';
                document.getElementById('login-form').submit();
            } else {
                alert("퍼즐을 맞춰주세요.");
            }
        });
    });
})