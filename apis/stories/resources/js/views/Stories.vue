<template>
    <tr>
        <td>{{ story.id }}</td>
        <td>
            <span>{{ story.plot }}</span>
        </td>
        <td>
            <span>{{ story.writer }}</span>
        </td>
        <td>
            <span>{{ story.upvotes }}</span>
        </td>
        <td>
            <div class="btn-group">
                <div @click="upvoteStory(story)" class="btn btn-primary">
                    Upvote
                </div>
                 <div @click="deleteStory(story)" class="btn btn-danger">
                    Delete
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
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'api/stories/'+story.id,
                type: 'PATCH',
                data: story,
            });
        },

        deleteStory: function(story) {
            this.$emit('deleteStory', story)
            //this.$root.stories.splice(story, 1)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'api/stories/' + story.id,
                type: 'DELETE'
            })
        }
    }
}
</script>
