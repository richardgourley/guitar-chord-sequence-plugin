if(document.getElementById("chordSequenceButtonsDiv")){

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
            obj.minor3 = chordGroupings[i].minor3;
            return obj;
		}
	}
	return null;
}

function printChords(obj){
    let rootChord = '';
    //Decide if starting with ROOT MAJOR or ROOT MINOR using random number
    let majorOrMinor = Math.random();
    if(majorOrMinor >= 0.5){
        rootChord += obj.rootMajor;
    }else{
        rootChord += obj.rootMinor;
    }
    //shuffle rest of chords
    let shuffledChords = shuffleChords([obj.major2, obj.major3, obj.minor2, obj.minor3]);
    
    //Display 2,3 and 4 chord sequences
    chordSequenceDisplayDiv.innerHTML = 
        '<h2>2 chords: ' + rootChord + ' ' + shuffledChords[0] + '</h2>' + 
        '<h2>3 chords: ' + rootChord + ' ' + shuffledChords[0] + ' ' + shuffledChords[1] + '</h2>' + 
        '<h2>4 chords: ' + rootChord + ' ' + shuffledChords[0] + ' ' + shuffledChords[1] + ' ' + shuffledChords[2] + '</h2>';
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




