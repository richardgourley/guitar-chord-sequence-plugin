console.log(chordGroupings);

if(document.getElementById("chordSequenceButtonsDiv")){
    console.log(Math.floor(Math.random() * 3));

    let chordSequenceButtonsDiv = 
    document.getElementById("chordSequenceButtonsDiv");

    let chordSequenceDisplayDiv = 
    document.getElementById("chordSequenceDisplayDiv");

    //assign a button for every title chord grouping title
    chordSequenceButtonsDiv.innerHTML = createButtons();
    
    //assign an action for each button onclick
    assignButtonActions();

}

function createButtons(){
    let html = '';
    let chordGroupingButtons = '';
    for(i=0; i<chordGroupings.length; i++){
        html += '<button id="' + chordGroupings[i].title + '">' + chordGroupings[i].title + '</button>';
    }
    return html;
}

function assignButtonActions(){
    for(i=0; i<chordGroupings.length; i++){
        document.getElementById(chordGroupings[i].title).onclick = function(){
            printChords(getChords(this.id));
        }
    }
}

//gets all chords and returns as an object for matching id/title
function getChords(id){
	let obj = {};
	for(i=0; i<chordGroupings.length; i++){
		if(id === chordGroupings[i].title){
            obj.rootMajor = chordGroupings[i].root_major;
			obj.rootMinor = chordGroupings[i].root_minor;
            obj.major2 = chordGroupings[i].major2;
            obj.major3 = chordGroupings[i].major3;
            obj.minor2 = chordGroupings[i].minor2;
            obj.minor3 = chordGroupings[i].minor2;
            return obj;
		}
	}
	return null;
}

function printChords(obj){
    let outputStr = '';
    //Decide if starting with ROOT MAJOR or ROOT MINOR using random number
    //set to int 1 or 2
    let majorOrMinor = Math.floor(Math.random() * 3);
    if(majorOrMinor == 1){
        outputStr += obj.rootMajor;
    }else{
        outputStr += obj.rootMinor;
    }
    //shuffle rest of chords
    let shuffledChords = shuffleChords([obj.major2, obj.major3, obj.minor1, obj.minor2]);
    for(i=0; i<shuffledChords.length; i++){
        if(i == (shuffledChords.length -1)){
            outputStr += shuffledChords[i];
        }else{
            outputStr += shuffledChords[i] + ' ';
        }
    }
    chordSequenceDisplayDiv.innerHTML = outputStr;
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

/*
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




