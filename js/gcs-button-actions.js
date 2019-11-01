console.log(chordGroupings);

if(document.getElementById("chordSequenceDisplayDiv")){
    let chordSequenceDisplayDiv = 
    document.getElementById("chordSequenceDisplayDiv");

    //assign a button for every title chord grouping title
    chordSequenceDisplayDiv.innerHTML = createButtons();


}

function createButtons(){
    let html = '';
    let chordGroupingButtons = '';
    for(i=0; i<chordGroupings.length; i++){
        html += '<button id="' + chordGroupings[i].title + '">' + chordGroupings[i].title + '</button>';
    }
    return html;
}



//assigns a function to each button id
for(i=0; i<chordGroupings.length; i++){
	document.getElementById(chordGroupings[i].title).onclick = function(){
        console.log(this.id);
        console.log(chordGroupings[i].root_major);
		//printChords(getChords(this.id));
	}
}

/*
//gets the chords that matches the element id to name
function getChords(id){
	let outputStr = '';
	for(i=0; i<chordGroupings.length; i++){
		if(id === 'button' + chordGroupings[i].name){
			return chordGroupings[i].chords;
		}
	}
	return null;
}

//displays shuffled chords in chordSequenceDisplayDiv
function printChords(chords){
    let outputStr = '';
    let shuffledChords = shuffleChords(chords);
    for(i=0; i<shuffledChords.length; i++){
    	if(i == (shuffledChords.length -1)){
    		outputStr += shuffledChords[i];
    	}else{
    		outputStr += shuffledChords[i] + ' ';
    	}
    }
    chordSequenceDisplayDiv.innerHTML = '<h1>' + outputStr + '</h1>';
}

function shuffleChords(chords){
	//Fisher Yates shuffle algorithm
    var j, x, i;
    for (i = chords.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = chords[i];
        chords[i] = chords[j];
        chords[j] = x;
    }
    return chords;
}
*/




