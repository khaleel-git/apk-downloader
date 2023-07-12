from wordpress_xmlrpc import Client, WordPressPost
from wordpress_xmlrpc.methods.posts import GetPosts, NewPost
from wordpress_xmlrpc.methods.users import GetUserInfo

wp = Client('https://apkfuel.com/xmlrpc.php', 'khaleel.org', 'Id35202@ms.apkfuel')
# print(wp.call(GetPosts()))

# print(wp.call(GetUserInfo()))


post = WordPressPost()
post.title = 'My new title'
post.content = 'This is the body of my new post.'
post.terms_names = {
'post_tag': ['test', 'firstpost'],
'category': ['Introductions', 'Tests']
}
post.id = post.post_status = 'publish'
datos_informacion = {
    'url_googleplay': None,
	'categoria' : 'Apps',
    'descripcion': "description"
}

post.custom_fields = datos_informacion 

wp.call(NewPost(post)) 

# above code draft the post

# from wordpress_xmlrpc import Client
# from wordpress_xmlrpc.methods import posts

# client = Client('https://apkfuel.com/xmlrpc.php', 'khaleel.org', 'Id35202@ms.apkfuel')
# posts = client.call(posts.GetPosts())

# post.id = post.post_status = 'publish'
# print(post.id)

# # Client.call(posts.EditPost(post.id, post))
# # Client.call(posts.NewPost(post))
