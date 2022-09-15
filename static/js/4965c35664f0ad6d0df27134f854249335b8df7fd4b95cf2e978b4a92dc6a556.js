function loadissue(){
    const request=new XMLHttpRequest;
    const session=window.sessionStorage;
    let from=session.getItem('from');
    request.open('GET','/api?from='+from,true);
    request.send();
    request.onload=()=>{
        if(request.response!='<a class="issue-heading" href="issues/"><h3></h3></a>\n<span class="issue"></span>\n<a class="issue-heading" href="issues/"><h3></h3></a><span class="issue"></span>\n<a class="issue-heading" href="issues/"><h3></h3></a><span class="issue"></span>\n<a class="issue-heading" href="issues/"><h3></h3></a><span class="issue"></span>\n<a class="issue-heading" href="issues/"><h3></h3></a><span class="issue"></span>\n<a class="issue-heading" href="issues/"><h3></h3></a><span class="issue"></span>\n'){
            sessionStorage.setItem('from',parseInt(from)+parseInt(3));
        }
        document.querySelector('.issues').innerHTML=document.querySelector('.issues').innerHTML+request.response;
    };
}