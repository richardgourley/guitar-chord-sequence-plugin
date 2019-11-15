(  function(blocks,element){
    var el = element.createElement;

    var blockStyle = {
        backgroundColor: '#900',
        color: '#fff',
        padding: '20px',
    };

    blocks.registerBlockType(
        'my_block_examples/my_block_example-01',
        {
        title: 'My Block Example 01',
        icon: 'universal-access-alt',
        category: 'layout',
        example: {},
        edit: function(){
            return el(
                'p',
                {style:blockStyle},
                'Hello World, step 1 from the editor.'
            );
        },
        save: function(){
            return el(
                'p',
                {style:blockStyle},
                'Hello World, step 1 from the editor.'
            );
        },
    }  );
}(
    window.wp.blocks,
    window.wp.element
) );
