<template>
    <div>
        <h1>Let's hear some stories</h1>
        <table class="table table-striped">
            <Stories @deleteStory="storyToDelete(story)"  v-for="story in stories" :story="story" :key="story.id"/>
        </table>
        <p class="lead">Here's a list of all your stories</p>
        <pre>{{ $data }}</pre>
    </div>
</template>

<script>
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
        this.$http({ url: 'api/stories', method: 'GET' })
            .then( function (response) {
                this.$set('stories', response.data)
                //this.stories = response.data;
            })

        })
    },

    methods:  {
        storyToDelete: function(story) {
            var index = this.stories.indexOf(story)
            this.stories.splice(index, 1)
        }

    }
}
</script>
