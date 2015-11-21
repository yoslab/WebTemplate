using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.IO;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Net;
using System.Web;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace $safeprojectname$
{
    public partial class $safeprojectname$ : Form
    {
        public $safeprojectname$()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string res = postPhp("insert_value", "1");
            textBox1.Text = res;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string res = postPhp("insert_value", (7).ToString(), "yoshino");
            textBox1.Text = res;
        }


        /// <summary>
        /// 任意のphpにデータを投げ，出力結果を得る (HttpUtilityクラスはSystem.Webを参照に追加すること)
        /// </summary>
        /// <param name="args">
        ///   [0]     ... URLの場所（拡張子なしのファイル名）
        ///   [1]以降 ... 投げるデータ．PHP側では$_POST['value0'], $_POST['value1'] ... として取得可
        /// </param>
        /// <returns>phpの出力結果</returns>
        static string postPhp(params string[] args)
        {

            Encoding enc = Encoding.UTF8;
            string url = "http://yoslab.net/~tanioka/test/" + args[0] + ".php";
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create(url);

            string param = "";
            Dictionary<string, string> dict = new Dictionary<string, string>();
            for (int i = 1; i < args.Length; i++)
            {
                dict["value" + i] = HttpUtility.UrlEncode(args[i], enc);
            }

            foreach (string k in dict.Keys)
            {
                param += String.Format("{0}={1}&", k, dict[k]);
            }

            byte[] postbytes = Encoding.ASCII.GetBytes(param);
            req.Method = "POST";
            req.ContentType = "application/x-www-form-urlencoded";
            req.ContentLength = postbytes.Length;
            Stream st = req.GetRequestStream();
            st.Write(postbytes, 0, postbytes.Length);

            HttpWebResponse res = (HttpWebResponse)req.GetResponse();

            string result = new StreamReader(res.GetResponseStream()).ReadToEnd();
            result = result.Replace(@"\", @"%");
            result = HttpUtility.UrlDecode(result);
            //Console.WriteLine(result);
            st.Close();
            return result;
        }

    }
}
