wp.blocks.registerBlockType('guitar-chord-sequence-plugin/key-buttons',{
    title: 'Guitar Chord Sequence Buttons',
    icon: 'smiley', 
    category: 'common',
    attributes: {
        content: {type:'string'},
        color: {type:'string'}
    },

    edit: function(props){
        return wp.element.createElement("div", null, wp.element.createElement("div", {
          id: "chordSequenceButtonsDiv",
          class: "chord-sequence-buttons-grid"
        }, wp.element.createElement("h3", null, "This is your guitar sequence plugin! The user will see buttons on the page to click and generate chord sequences!")), React.createElement("div", {
          id: "chordSequenceDisplayDiv"
        }));
    },

    save: function(){
        /*return wp.element.createElement("div", null, wp.element.createElement("div", {
          //id: "chordSequenceButtonsDiv",
          id: "chordSequenceButtonsDiv",
          class: "chord-sequence-buttons-grid"
        }), wp.element.createElement("div", {
          id: "chordSequenceDisplayDiv"
        }));*/
        return wp.element.createElement("div", {class: "gcs-grid-container"}, 
        wp.element.createElement("div", {id: "chordSequenceButtonsDiv", class: "chord-sequence-buttons-grid"}), 
        wp.element.createElement("div", {id: "chordSequenceDisplayDiv", class: "chord-sequence-display-div"}));
    }

});



