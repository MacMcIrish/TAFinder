import networkx as nx
import math
from decimal import *
from networkx.algorithms import bipartite
from operator import itemgetter
import csv


TAInfoSem1= []
TAInfoSem2= []
CourseInfo = []
TATitle = ['TA name','Student Number', 'Assigned Hrs', 'Pref Hrs', 'Residual Hrs', 'Course 1', 'Course 2', 'Course 3', 'Course 4', 'Course 5', 'Course 6', 'Year', 'Faculty', 'Full Time', 'Experienced', 'Email', 'Home Phone', 'Cell', 'Address', 'Employee #']
CourseTitle = ['Course', 'Semester','Req Hrs','Requires', 'TA name', 'Student Number']

TAInfoSem1.append(TATitle)
TAInfoSem2.append(TATitle)
CourseInfo.append(CourseTitle)

Sem1 = nx.DiGraph()
Sem2 = nx.DiGraph()
Sem1.add_node('s')
Sem1.add_node('t')
Sem2.add_node('s')
Sem2.add_node('t')

taFile = open ('taFile.txt', 'r')
i = 0
for line in taFile:
	i += 1
	exp = ''
	full = ''
	lineBreak = line.split(',')
	if (lineBreak[14] == 0):
		exp = 'false'
	else:
		exp = 'true'
	if(lineBreak[13] == 0):
		full = 'false'
	else:
		full = 'true'	
	TaRow1 = [lineBreak[0]+' '+lineBreak[1], lineBreak[2], 0, int(lineBreak[15]),int(lineBreak[16]), '*','*','*','*','*','*',lineBreak[4],lineBreak[3], full, exp, lineBreak[6], lineBreak[10], lineBreak[11], lineBreak[7]+' '+lineBreak[8]+' '+lineBreak[9], lineBreak[5]]
	TaRow2 = [lineBreak[0]+' '+lineBreak[1], lineBreak[2], 0, int(lineBreak[15]),int(lineBreak[16]), '*','*','*','*','*','*',lineBreak[4],lineBreak[3], full, exp, lineBreak[6], lineBreak[10], lineBreak[11], lineBreak[7]+' '+lineBreak[8]+' '+lineBreak[9], lineBreak[5]]
	TAInfoSem1.append(TaRow1)
	TAInfoSem2.append(TaRow2)
	if lineBreak[4] == 'G':
		Sem1.add_node(lineBreak[2], year = lineBreak[4], pref = lineBreak[15], max = lineBreak[16], resid = 12)
		Sem1.add_edge(lineBreak[2], 't', capacity = 2, type = 'ta')
		Sem2.add_node(lineBreak[2], year = lineBreak[4], pref = lineBreak[15], max = lineBreak[16], resid = 12)
		Sem2.add_edge(lineBreak[2], 't', capacity = 2, type = 'ta')
	else:
		Sem1.add_node(lineBreak[2], year = lineBreak[4], pref = lineBreak[15], max = lineBreak[16], resid = 12)
		Sem1.add_edge(lineBreak[2], 't', capacity = 2, type = 'ta')	
		Sem2.add_node(lineBreak[2], year = lineBreak[4], pref = lineBreak[15], max = lineBreak[16], resid = 12)
		Sem2.add_edge(lineBreak[2], 't', capacity = 2, type = 'ta')	
print("Number of TAs is: "+ str(i))
taFile.close()

courseFile = open ('courseFile.txt', 'r')
maxflow = 0
for line in courseFile:
	maxflow += 1
	lineBreak = line.split(',')
	CourseRow = [lineBreak[0], lineBreak[1], int(lineBreak[2]), lineBreak[3], '*', '*']
	CourseInfo.append(CourseRow)
	if lineBreak[1] == '1': #if in semester1
		Sem1.add_node(lineBreak[0], hours = lineBreak[2])
		Sem1.add_edge('s', lineBreak[0], capacity = 1, type = 'course')
	else:
		Sem2.add_node(lineBreak[0], hours = lineBreak[2])
		Sem2.add_edge('s', lineBreak[0], capacity = 1, type = 'course')
print("Number of Courses is: "+ str(maxflow))
courseFile.close()

workFile = open ('workFile.txt', 'r')
i = 0
for line in workFile:
	i += 1
	lineBreak = line.split(',')
	if lineBreak[2] == '1': #if in semester1
		Sem1.add_edge(lineBreak[1], lineBreak[0], capacity = 1, type = 'match')
	else:
		Sem2.add_edge(lineBreak[1], lineBreak[0], capacity = 1, type = 'match')
print("Number of Selected matches is: "+ str(i))
workFile.close()

flow_value1, flow_dict1 = nx.maximum_flow(Sem1, 's', 't')
flow_value2, flow_dict2 = nx.maximum_flow(Sem2, 's', 't')

print(flow_dict1)
print(flow_value1)
print(flow_dict2)
print(flow_value2) 

for course in flow_dict1.keys():
	print("Course is:" + course)
	for TA, flow in flow_dict1[course].items():
		print("TA is:" + TA)
		print("Flow is:" + str(flow))
		if(flow == 1 and course != 's' and course != 't' and TA != 's' and TA != 't'):	
			i = 0
			while i < len(CourseInfo):
				if(CourseInfo[i][0] == course):
					break
				else:
					i += 1
			print("I is:" + str(i))
			j = 0
			while j < len(TAInfoSem1):
				if(TAInfoSem1[j][1] == TA):
					break
				else:
					j += 1
			
			print("J is:" + str(j))
			TAInfoSem1[j][2] += CourseInfo[i][2]
			TAInfoSem1[j][4] -= CourseInfo[i][2]
			
			k = 5
			while k < 11:
				if(TAInfoSem1[j][k] == '*'):
					TAInfoSem1[j][k] = course
					break
				else:
					k += 1
			
			CourseInfo[i][4] = TAInfoSem1[j][0]
			CourseInfo[i][5] = TAInfoSem1[j][1]
		
			Sem1.node[TAInfoSem1[j][1]]['resid'] -= CourseInfo[i][2]

print("Checking semester2")
			
for course in flow_dict2.keys():
	print("Course is:" + course)
	for TA, flow in flow_dict2[course].items():
		print("TA is:" + TA)
		print("Flow is:" + str(flow))
		if(flow == 1 and course != 's' and course != 't' and TA != 's' and TA != 't'):	
			i = 0
			while i < len(CourseInfo):
				if(CourseInfo[i][0] == course):
					break
				else:
					i += 1
			print("I is:" + str(i))
			j = 0
			while j < len(TAInfoSem2):
				if(TAInfoSem2[j][1] == TA):
					break
				else:
					j += 1
			
			print("J is:" + str(j))
			TAInfoSem2[j][2] += CourseInfo[i][2]
			TAInfoSem2[j][4] -= CourseInfo[i][2]
			
			k = 5
			while k < 11:
				if(TAInfoSem2[j][k] == '*'):
					TAInfoSem2[j][k] = course
					break
				else:
					k += 1
			
			CourseInfo[i][4] = TAInfoSem2[j][0]
			CourseInfo[i][5] = TAInfoSem2[j][1]
			
			Sem2.node[TAInfoSem2[j][1]]['resid'] -= CourseInfo[i][2]

r = 1
while r < len(CourseInfo):
	print("Course is:" + CourseInfo[r][0]+ " Sem is: "+CourseInfo[r][1])
	if(CourseInfo[r][1] == '1'):
		print("in sem1 test")
		neighbours = Sem1.neighbors(CourseInfo[r][0])
		print("Length of neighbours is: " + str(len(neighbours)))
		if(CourseInfo[r][4] == '*' and len(neighbours) > 0):
			g = 0
			while g < len(neighbours):
				print("Residual is: " + str(Sem1.node[neighbours[g]]['resid']))
				if(Sem1.node[neighbours[g]]['resid'] >= CourseInfo[r][2]):
					print("Found a residual")
					j = 0
					while j < len(TAInfoSem1):
						if(TAInfoSem1[j][1] == neighbours[g]):
							break
						else:
							j += 1
					
					TAInfoSem1[j][2] += CourseInfo[r][2]
					TAInfoSem1[j][4] -= CourseInfo[r][2]
			
					k = 5
					while k < 11:
						if(TAInfoSem1[j][k] == '*'):
							TAInfoSem1[j][k] = CourseInfo[r][0]
							break
						else:
							k += 1
			
					CourseInfo[r][4] = TAInfoSem1[j][0]
					CourseInfo[r][5] = TAInfoSem1[j][1]
				
					Sem1.node[TAInfoSem1[j][1]]['resid'] -= CourseInfo[r][2]
					break
				else:
					g +=1	
		else:
			r += 1	
	else:
		print("in sem2 test")
		neighbours = Sem2.neighbors(CourseInfo[r][0])
		print("Length of neighbours is: " + str(len(neighbours)))
		if(CourseInfo[r][4] == '*' and len(neighbours) > 0):
			g = 0
			while g < len(neighbours):
				print("Residual is: " + str(Sem2.node[neighbours[g]]['resid']))
				if(Sem2.node[neighbours[g]]['resid'] >= CourseInfo[r][2]):
					print("Found a residual")
					j = 0
					while j < len(TAInfoSem2):
						if(TAInfoSem2[j][1] == neighbours[g]):
							break
						else:
							j += 1
					
					TAInfoSem2[j][2] += CourseInfo[r][2]
					TAInfoSem2[j][4] -= CourseInfo[r][2]
			
					k = 5
					while k < 11:
						if(TAInfoSem2[j][k] == '*'):
							TAInfoSem2[j][k] = CourseInfo[r][0]
							break
						else:
							k += 1
			
					CourseInfo[r][4] = TAInfoSem2[j][0]
					CourseInfo[r][5] = TAInfoSem2[j][1]
				
					Sem2.node[TAInfoSem2[j][1]]['resid'] -= CourseInfo[r][2]
					break
				else:
					g += 1	
		else:
			r += 1


print(CourseInfo)
print(TAInfoSem1)
print(TAInfoSem2)
					
with open("results.csv", "wb") as f:
    writer = csv.writer(f)
    writer.writerow(['Semester 1'])
    writer.writerows(TAInfoSem1)
    writer.writerow(['','','','','','','','','','','','','','','','','','','',''])
    writer.writerow(['Semester 2'])
    writer.writerows(TAInfoSem2)
    writer.writerow(['','','','','','','','','','','','','','','','','','','',''])
    writer.writerows(CourseInfo)
    f.close()			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			





