/// <reference path="../../typings/browser.d.ts" />
import * as NovumWare from "../novumware";
import {SubmissionStatsController} from "./SubmissionStatsController";
import {QuestionController} from "./QuestionController";
import {QuestionModel} from "./Question";
declare var NWRequest;


// =========================================== Survey Controller ==========================================
interface ISurveyControllerProps {
	question_id: number;
}

interface ISurveyControllerState {
	answeredQuestion?: QuestionModel;
}

export class SurveyController extends React.Component<ISurveyControllerProps, ISurveyControllerState> {
	state: ISurveyControllerState = {
		// answeredQuestion: new QuestionModel({
		// 	id:	2,
		// 	question_text:	"What is your favourite color?",
		// 	selected_answer_id: 1,
		// 	correct_answer_id: 2
		// })
	};

	handleQuestionSubmitSuccess(question:QuestionModel) {
		console.log('SurveyController.handleQuestionSubmitSuccess');
		this.setState({
			answeredQuestion: question
		})
	}

	render() {
		var displayedPage = (this.state.answeredQuestion) ?
			<SubmissionStatsController question={this.state.answeredQuestion} question_id={this.state.answeredQuestion.id || this.props.question_id} /> :
			<QuestionController question_id={this.props.question_id} submitSuccessAction={this.handleQuestionSubmitSuccess.bind(this) } />;

		return (
	        <div>
	        	{displayedPage}
	       	</div>
        );
	}
}
