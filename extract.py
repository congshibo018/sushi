#coding:utf-8
import sys
import os
from pymysql import connect
#连接数据库
conn= connect(
        host='localhost',
        port = 3306,
        user='root',
        passwd='123',
        db ='HefengSushi',
        use_unicode=True, 
        charset="utf8"
        )
#创建操作游标,创建了mysql的操作链接
a=conn.cursor()
#设置字符集为Utf-8
a.execute('set names utf8')

f = open('menu.txt')
for i in f:
  i = i.replace("\t","").replace("\n","")
  t = i.split(",")
  sql='''insert into Dish(id,DishName,Picture,Price,Series) values({0},{1},{2},{3},{4});'''.format("'"+t[0]+"'","'"+t[1]+"'","'"+t[0]+".png'",float(t[2]),"'"+t[3]+"'")
  print(sql)
  a.execute(sql)
conn.commit()
conn.close()