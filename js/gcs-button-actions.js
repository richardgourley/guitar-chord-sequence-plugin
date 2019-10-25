for(i=0; i<chordGroupings.length; i++){
	document.getElementById("button" + chordGroupings[i].name).onclick = function(){
		printChordSequence(this.id);
	}
}

function printChordSequence(id){
	for(i=0; i<chordGroupings.length; i++){
		if(id === 'button' + chordGroupings[i].name){
			console.log(shuffleChords(chordGroupings[i].chords));
		}
	}
}

function shuffleChords(chords){
	//Fisher Yates shuffle algorithm
    $outputStr = '';
    var j, x, i;
    for (i = chords.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = chords[i];
        chords[i] = chords[j];
        chords[j] = x;
    }
    return chords;
}

let chordSequenceDisplayDiv = 
document.getElementById("chordSequenceDisplayDiv");



