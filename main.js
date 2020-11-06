var DOM = {
    codeBlocks: '.code-blocks',
};

function typeInTextarea(newText, el = document.querySelector('#tb')) {
    const [start, end] = [el.selectionStart, el.selectionEnd];
    el.setRangeText(newText, start, end, 'select');
}
  
// Static implementation of adding a code block to the text editor 

var addCode = function addLoop(event) {

    console.log(event);

    
    if(event.target.value == 'for') {
    
        text = `
        for(let i = 0; i < x; i++) {
            // your code here
        }
        `;
        typeInTextarea(text);
          
    } else if(event.target.value == 'if-else') {
        
        text = `
        if(x) {
            // your code here
        } else {
            // your code here
        }
        `;
        typeInTextarea(text);

    } else if(event.target.value == 'multiplication') {
        
        text = `
        function multiply(p1, p2) {
            return p1 * p2; // The function returns the product of p1 and p2
            }
        `;
        typeInTextarea(text);
    }
};

document.querySelector(DOM.codeBlocks).addEventListener("click", addCode);

// Static implementation of displaying the output in a new window
function showOp() {
    window.open('/output.html', '_blank');
}

function addCodeBlock() {
    document.querySelector("#exampleModalCenter").classList.toggle("hidden");
}