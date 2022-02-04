#SNS Login

## SNS Login 구현시 주체
1. 서비스를 만드는 client(제공자-나)
2. 소셜로그인을 기능을 사용하는 resource owner(사용자)
3. 소셜로그인 기능을 제공하고 사용자의 데이터를 가지고 있는 resource server(소셜-카카오, 네이버등)

## SNS Login 구현원리
1. 소셜로그인 버튼을 누르면 해당 소셜 로그인 페이지로 이동
2. OAuth를 사용하여 제공자와 사용자 사이에서 소셜서버가 로그인을 중개
3. 소셜 로그인 성공시 소셜은 OAuth를 거쳐 제공자에게 Access Token을 제공, 제공자는 Access Token을 통해 소셜접근 회원정보 조회 및 로그인

## SNS Login 구현절차
1. 제공자를 소셜에 등록
: 아래 3가지를 등록한다
	a. client ID(제공자가 구현하는 서비스의 식별 ID)
	b. client Secret(제공자 소셜서비스 로그인 Password)
	c. Redirect URL(Authorized Code(인증코드)를 전달할 주소(로그인시 리다이렉트 주소))

2. 사용자 승인
	a. 사용자가 소셜의 로그인창으로 이동
	b. 로그인 되어 있는 경우는 제공자의 ID를 점검
	c. 로그인 되어있지 않은 경우는 로그인 진행
	
3. Access Token 발급(헤더에 Access Token을 첨부하기 위해)
	a. apiURL을 api명세 맞게 구현후 접속
	b. 소셜이 apiURL의 client ID, client Seceret, Redirect URL 일치 확인.
	c. 일치시 Access Token 발급
	
4. 사용자의 데이터 요청
	a. 발급 받은 Access Token을 헤더에 Authrozation: "" 입력
	b. API url로 위의 헤더 요청
	c. Access Token 일치시 사용자의 데이터를 가져온다.

5. 로그인
	가져온 사용자의 데이터를 세션처리 하여 로그인
