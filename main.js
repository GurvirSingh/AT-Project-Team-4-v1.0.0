var DOM = {
    codeBlocks: '.code-blocks',
};

function typeInTextarea(newText, el = document.querySelector('#tb')) {
    const [start, end] = [el.selectionStart, el.selectionEnd];
    el.setRangeText(newText, start, end, 'select');

    setTimeout(function(){
        input = document.querySelector('#tb');
        input.focus(); 
        var val = this.input.value; //store the value of the element
        this.input.value = ''; //clear the value of the element
        this.input.value = val;
        enterKey()
        })
   
}

function enterKey() {
    // Testing 

    // console.log('inside');
    // e = jQuery.Event("keydown")
    // e.which = 13 //choose the one you want
    // $("#tb").keypress(function() {
    //     console.log('keydown triggered');
    // }).trigger(e)
    element = document.querySelector('#tb');
    element.dispatchEvent(new KeyboardEvent('keydown',{'key':'a'}));
}

function unescapeHTML(escapedHTML) {
  return escapedHTML.replace(/&lt;/g,'<').replace(/&gt;/g,'>').replace(/&amp;/g,'&');
}

function addCodeBlock(id){
    alert("Adding code block of ID:"+id);
    var element = document.getElementById(id);
    var txtarea = document.getElementById("tb");
    var refined = element.innerHTML.replace("<br>","");
    typeInTextarea(unescapeHTML(refined));
}
  
// Static implementation of adding a code block to the text editor 

// var addCode = function addLoop(event) {

//     console.log(event);

    
//     if(event.target.value == 'for') {
    
//         text = `
//         for(let i = 0; i < x; i++) {
//             // your code here
//         }
//         `;
//         typeInTextarea(text);
          
//     } else if(event.target.value == 'if-else') {
        
//         text = `
//         if(x) {
//             // your code here
//         } else {
//             // your code here
//         }
//         `;
//         typeInTextarea(text);

//     } else if(event.target.value == 'multiplication') {
        
//         text = `
//         function multiply(p1, p2) {
//             return p1 * p2; // The function returns the product of p1 and p2
//             }
//         `;
//         typeInTextarea(text);
//     }  else if(event.target.value == 'addition') {
        
//         text = `
//         function add(p1, p2) {<br>
//           return p1 + p2;   // The function returns the addition of p1 and p2<br>
//         }`
//         typeInTextarea(text);
//     } else if(event.target.value == 'subtraction') {
        
//         text = `
//         for(let i = 0; i < 5; i++) {

//         //Code here
//         console.log("Hello World "+i+"\n");
        
//         }`
//         typeInTextarea(text);
//     } else if(event.target.value == 'division') {
        
//         text = `
//         function divise(p1, p2) {<br>
//           return p1 / p2;   // The function returns the subtraction of p1 and p2<br>
//         }`
//          typeInTextarea(text);
//         } else if(event.target.value == 'while') {
        
//         text = `
//         while (x) {

//         //Code here
        
//         }`
//          typeInTextarea(text);
//         }  else if(event.target.value == 'hello') {
        
//         text = `
//         function helloworld(){
//           alert('Hello World!');
//         }`
//          typeInTextarea(text);
//         } else if(event.target.value == 'Create') {
        
//         text = `
//         var ul = document.createElement("UL");
//         var node, textnode; 
        
//         for(let i = 0; i < 5; i++) {
//         //Code here
//         	node = document.createElement("LI");
//         	textnode = document.createTextNode("test"+(i+1));
//         	node.appendChild(textnode);
//         	ul.appendChild(node);
//         }
        
//         document.body.appendChild(ul);`
//          typeInTextarea(text);
//         }
// }; 

// document.querySelector(DOM.codeBlocks).addEventListener("click", addCode);

// Static implementation of displaying the output in a new window
function showOp() {
    window.open('/output.html', '_blank');
}

// function addCodeBlock() {
//     document.querySelector("#exampleModalCenter").classList.toggle("hidden");
// }

