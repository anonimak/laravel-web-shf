<template>
  <div class="editor">
    <editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
      <b-button-group v-if="editMode" class="mb-4">
        <b-button
            :class="{ 'active': isActive.bold()}"
            @click="commands.bold"
            variant="light"
            >
            <i class="fa fa-bold" />
        </b-button>
        <b-button
            :class="{ 'active': isActive.italic()}"
            @click="commands.italic"
            variant="light"
            >
            <i class="fa fa-italic" />
        </b-button>
        <b-button
            :class="isActive.strike() && 'active'"
            @click="commands.strike"
            variant="light"
            >
            <i class="fa fa-strikethrough" />
        </b-button>

        <b-button
            :class="isActive.underline() && 'active'"
            @click="commands.underline"
            variant="light"
            >
            <i class="fa fa-underline" />
        </b-button>

        <b-button
            :class="isActive.code() && 'active'"
            @click="commands.code"
            variant="light"
            >
            <i class="fa fa-code" />
        </b-button>

        <b-button
            :class="isActive.paragraph() && 'active'"
            @click="commands.paragraph"
            variant="light"
            >
            <i class="fa fa-paragraph" />
        </b-button>
        
        <b-button
            :class="{ 'active': isActive.heading({ level: 1 }) }"
            @click="commands.heading({ level: 1 })"
            variant="light"
            >
            H1
        </b-button>

        <b-button
            :class="{ 'active': isActive.heading({ level: 2 }) }"
            @click="commands.heading({ level: 2 })"
            variant="light"
            >
            H2
        </b-button>

        <b-button
            :class="{ 'active': isActive.heading({ level: 3 }) }"
            @click="commands.heading({ level: 3 })"
            variant="light"
            >
            H3
        </b-button>

        <b-button
          :class="{ 'active': isActive.bullet_list() }"
          @click="commands.bullet_list"
          variant="light"
        >
          <i class="fa fa-list-ul" />
        </b-button>

        <b-button
          :class="{ 'active': isActive.ordered_list() }"
          @click="commands.ordered_list"
          variant="light"
        >
          <i class="fa fa-list-ol" />
        </b-button>

        <b-button 
          @click="loadImage(commands.image)"
          variant="light"
        >
          <i class="fa fa-image" />
        </b-button>

        <b-button
          :class="{ 'active': isActive.blockquote() }"
          @click="commands.blockquote"
          variant="light"
        >
          <i class="fa fa-quote-right" />
        </b-button>

        <b-button
          :class="{ 'active': isActive.code_block() }"
          @click="commands.code_block"
          variant="light"
        >
          <i class="fa fa-code" />
        </b-button>

        <b-button
          @click="commands.horizontal_rule"
          variant="light"
        >
          <i class="fa fa-ruler-horizontal" />
        </b-button>

        <b-button
          @click="commands.undo"
          variant="light"
        >
          <i class="fa fa-undo" />
        </b-button>

        <b-button
          @click="commands.redo"
          variant="light"
        >
          <i class="fa fa-redo" />
        </b-button>
      </b-button-group>
    </editor-menu-bar>
    <editor-content v-if="editMode" class="editor__content" :editor="editor" />
    <div v-else v-html="value"></div>
  </div>
</template>

<script>

import { Editor, EditorContent, EditorMenuBar } from 'tiptap'
import {
  Blockquote,
  CodeBlock,
  HardBreak,
  Heading,
  HorizontalRule,
  OrderedList,
  BulletList,
  ListItem,
  TodoItem,
  TodoList,
  Bold,
  Code,
  Italic,
  Link,
  Strike,
  Underline,
  History,
  Image,
} from 'tiptap-extensions'

export default {
  props:{
      editMode : {
          type: Boolean,
          default: true
      },
      value : {
          type: String,
          default: ""
      }
  },
  components: {
    EditorContent,
    EditorMenuBar,
  },
  data() {
    return {
      editor: new Editor({
        editable:true,
        content:'',
        extensions: [
          new Blockquote(),
          new BulletList(),
          new CodeBlock(),
          new HardBreak(),
          new Heading({ levels: [1, 2, 3] }),
          new HorizontalRule(),
          new ListItem(),
          new OrderedList(),
          new TodoItem(),
          new TodoList(),
          new Link(),
          new Bold(),
          new Code(),
          new Italic(),
          new Strike(),
          new Underline(),
          new History(),
          new Image(),
        ],
        onUpdate: ( { state, getHTML, getJSON, transaction } ) => {
            console.log(getHTML())
            this.$emit('input',getHTML())
        }
      }),
    }
  },
  methods:{
    loadImage:function(command){
      command({src: "https://66.media.tumblr.com/dcd3d24b79d78a3ee0f9192246e727f1/tumblr_o00xgqMhPM1qak053o1_400.gif"})
    }
  },
  watch: {
    value: {
      handler(newVal, oldVal) {
        this.editor.setContent(newVal);
        // console.log(`value changed: ${newVal}`);
      },
      immediate: true
    }
  },
  beforeDestroy() {
    this.editor.destroy()
  },
}
</script>