using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Algorithm
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            Init();
        }

        private void Init()
        {
            //字符串取数
            List<int> liOut;
            this.button1.Click += delegate
            {
                string str = this.txtInput.Text.ToString();
                liOut = GetIntArrayFromString("12fds3g45,wg.r653");

                if (liOut != null)
                    txtOutput.Text = GetStringFromList(liOut);
            };
        }

        private string GetStringFromList(List<int> liOut)
        {
            string strOut = string.Empty;
            if (liOut == null)
                return strOut;

            foreach (int i in liOut)
                strOut += i.ToString() + ',';

            return strOut.Length > 1 ? strOut.TrimEnd(',') : strOut;
        }

        //
        private List<int> GetIntArrayFromString(string strSource)
        {
            if (strSource == null || strSource.Length <= 0)
                return null;

            char[] arySource = strSource.ToArray();
            List<int> list = new List<int>();

            string tmp = string.Empty;
            for (int i = 0; i < arySource.Length; i++)
            {
                //数字进行拼串
                if (char.IsDigit(arySource[i]))
                {
                    tmp = tmp + arySource[i].ToString();
                    if (i == arySource.Length - 1)
                        list.Add(int.Parse(tmp));
                }//非数字且前一位为数字添加List
                else if (i - 1 > 0 && char.IsDigit(arySource[i - 1]))
                {
                    list.Add(int.Parse(tmp));
                    tmp = string.Empty;
                }
            }
            //list.ToArray();
            return list;
        }
    }
}
