# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "/"
sass_dir = "/"
images_dir = "images"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = true
sourcemap = true

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass common/css/input scss && rm -rf sass && mv scss sass


    #http_path：サイトのパス
    #css_dir：CSS ファイルが書き出される場所
    #sass_dir：SCSS ファイルの場所
    #images_dir：画像ディレクトリ　※画像サイズを取得する時、この指定したディレクトリ以下を見るようです
    #javascript_dir：JavaScript ファイルの場所
    #output_style：   expanded、nested、compact、compressed    SASS の書き出し方設定。:expanded, :nested, :compact or :compressed 「:expanded」{} で改行する形。よくみる CSS の記述形式はこれです。可読性たかし。 「:nested」Sass ファイルのネストがそのまま引き継がれる形。 「:compact」セレクタと属性を 1 行にまとめて出力。可読性低め。 「:compressed」圧縮して出力（全ての改行・コメントをトルツメ）。可読性は投げ捨て。
    #line_comments：CSS に SCSS での行番号を出力するかどうか。true or false
