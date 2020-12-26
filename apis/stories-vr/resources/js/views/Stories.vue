<template>
    <tr>
        <td>{{ story.id }}</td>
        <td>
            <input v-if="story.editing" v-model="story.plot" class="form-control">
            <span v-else>{{ story.plot }}</span>
        </td>
        <td>
            <input v-if="story.editing" v-model="story.writer" class="form-control">
            <span v-else>{{ story.writer }}</span>
        </td>

        <td>
            <span>{{ story.upvotes }}</span>
        </td>
        <td>
            <div class="btn-group" v-if="!story.editing">
                <div @click="upvoteStory(story)" class="btn btn-primary">
                    Upvote
                </div>
                <div @click="deleteStory(story)" class="btn btn-danger">
                    Delete
                </div>
                <div @click="editStory(story)" class="btn btn-warning">
                    Edit
                </div>
            </div>
            <div class="btn-group" v-else>
                <div v-if="story.id" @click="updateStory(story)" class="btn btn-primary">
                    Update
                </div>
                <div v-else @click="storeStory(story)" class="btn btn-success">
                    Save
                </div>
                <div @click="story.editing = false" class="btn btn-danger">
                    Cancel
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {

    props: ['story'],

    methods: {
        upvoteStory: function(story) {
            story.upvotes++;
            axios.patch('api/stories/upvote/' + story.id, story)
        },

        editStory: function (story) {
            story.editing = true
        },

        updateStory: function (story){
            axios.patch('stories/' + story.id, story, {
                header: { 'X-CSRF-TOKEN': window.csrf_token }
            })
            console.log(story)
            story.editing = false
        },

        deleteStory: function(story) {
            this.$emit('deleteStory', story)
            axios.delete('api/stories/destroy/' + story.id)
        },

        storeStory(story) {
            axios.post('stories/', story, )
            story.editing = false
            this.$emit('callFetch')
            //fetchStories()
        }
    }
}
</script>
