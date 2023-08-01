document.getElementById("handler-text")
onclick = ()=>{

    coloredText(document.getElementById("hand-text").innerHTML.split(" "),0)
};

const coloredText = (text,i) =>{
    while (text[i].length <= 1)
        i++;
    let newText = [...text];
    newText[i] = `<span style="color: black">${text[i]}</span>`;
    newText = newText.join(" ");
    document.getElementById("hand-text").innerHTML = newText;
    if(i < text.length-1)
        setTimeout(()=>coloredText(text,i+1),1000);
}