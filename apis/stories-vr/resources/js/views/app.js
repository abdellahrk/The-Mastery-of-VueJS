import Stories from './Stories'
export default {

    components: {
        Stories
    },

    data() {
        return {
            stories: []
        }
    },

    mounted: function() {
        this.fetchStories()
    },

    methods:  {

        fetchStories () {
            axios.get('api/stories')
            .then(  response => {
                var allStories = response.data.map(function(story){
                    story.editing = false
                    return story
                })
                this.stories = allStories
                console.log(window.csrf_token)
            })
        },

        storyToDelete: function(story) {
            var index = this.stories.indexOf(story)
            this.stories.splice(index, 1)
        },

        createStory: function() {
            var newStory = {
                "plot" : "",
                "upvotes" : 0,
                "writer" : "",
                "editing" : true
            };
            this.stories.push(newStory);
        },

    }
}


