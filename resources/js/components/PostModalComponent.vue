<template>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
        class="modal fade"
        id="postModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="post-modal-title"
        aria-hidden="true"
        v-if="post"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ post.title }}</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">{{ post.content }}</div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["post"],
    created() {},
    watch: {
        post: function(newVal, oldVal) {
            console.log("newVal", newVal);
            $("#postModal").modal("show");
        }
    }
};
</script>
