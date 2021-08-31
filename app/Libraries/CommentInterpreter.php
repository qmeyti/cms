<?php

namespace App\Libraries;

use App\Models\Comment;

class CommentInterpreter
{

    /**
     * Get page author name
     *
     * @param Comment $comment
     * @param string|null $field
     * @return string
     */
    public static function author(Comment $comment, string $field = null)
    {
        $mode = $field ?? __stg('page_author_name_show_model', 'nickname');

        if ($mode === 'fullname') {

            return $comment->user->name . ' ' . $comment->user->family;

        } elseif ($mode === 'username') {

            return $comment->user->username ?? 'ناشناس';

        } elseif ($mode === 'role') {

            $role = $comment->user->roles->first();

            if (!is_null($role))
                return $role->label;

        } elseif ($mode === 'family') {

            return $comment->user->family;

        } elseif ($mode === 'nickname') {

            return $comment->user->nickname;

        }

        return $comment->user->name;

    }

    /**
     * @param Comment $comment
     * @param string $format
     * @param string $type
     * @return string
     */
    public static function getDate(Comment $comment, string $format, string $type = 'jalali')
    {
        if ($type === 'jalali') {

            return jdate($comment->creatd_at ?? now())->format($format);

        } else {
            /**
             * Todo
             */
            return '';
        }
    }
}
